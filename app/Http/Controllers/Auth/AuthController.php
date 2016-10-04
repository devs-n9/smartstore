<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Validator;
use Mail;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    // Default view
    public function getRegister()
    {
        return view('auth.register');
    }

    // Validation reg form
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    // Create user
    protected function create(array $data)
    {
        $user = User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $this_user_id = User::where('email', $data['email'])->select('id')->first();
        $user_profile = Profile::create([
            'user_id' => $this_user_id['id'],
            'first_name' => '',
            'last_name' => '',
            'gender' => $data['gender'],
            'tel' => '',
            'address' => ''
        ]);
        return $user;
    }


    // Register user
    public function userRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator);
        };

        $user = $this->create($request->all());

        // Create activetion code
        $code = CodeController::generateCode(8);
        Code::create([
            'user_id' => $user->id,
            'code' => $code,
        ]);

        // Generate link & sand it
        $url = url('/').'/activate?id='.$user->id.'&code='.$code;
        Mail::send('emails.registration', array('url' => $url), function($message) use ($request)
        {
            $message->from('mr.korg@ya.ru', 'Smartstore');
            $message->to($request->email)->subject('Registration');
        });
        return view('auth.register_message', ['message'=>'Registration is successful, email sent with a link to activate your account']);
    }

    // Activate user
    public function activate(Request $request)
    {
        $result = Code::where('user_id',$request->id)->where('code',$request->code)->first();
        if($result) {
            $result->delete(); // Delete activation code
            User::find($request->id)->update(['activated'=>1]); // Activate user profile
            return redirect()->to('/login')->with(['message' => 'ok']);
        }
        return abort(404);
    }

    // Authorization
    public function getLogin()
    {
        return view('auth.login');
    }
    public function userLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'activated' => 1])){
            return redirect()->to('/profile');
        } else {
            return redirect()->to('/login');
        }
    }

    // Profile
    public function userProfile()
    {
        return view('auth.profile');
    }

}
