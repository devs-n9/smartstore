<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Validation reg form
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'confirmed|min:6',
        ]);
    }

    public function thisUser()
    {
        $user = DB::table('users')
            ->join('profile', function ($join) {
                $join->on('users.id', '=', 'profile.user_id')
                    ->where('profile.user_id', '=', Auth::user()->id);
            })
            ->get();
        return $user[0];
    }
    public function getProfile()
    {
        $this_user = $this->thisUser();
        return view("auth.profile", ["user"=>$this_user]);
    }
    public function updateProfile(Request $request)
    {
        if($request){
            $validator = $this->validator($request->all());
            $data = $request->all();
            if ($validator->fails()) {
                return redirect('/profile')->withErrors($validator);
            } else {

                $this_user = $this->thisUser();

                // Work with image
                $fileName = $this_user->avatar;
                if($request->hasFile("avatar")){
                    $file = $request->file("avatar");
                    $fileName = md5(time() . rand(1, 999)) . '.' . $file->extension();
                    $uploadPath = base_path() . '\public\uploads\images\users';
                    $file->move($uploadPath, $fileName);
                }
                // Update profile
                $user_profile = Profile::where('user_id', Auth::user()->id)->update([
                  'first_name' => $data['first_name'],
                  'last_name' => $data['last_name'],
                  'gender' => $data['gender'],
                  'age' => $data['age'],
                  'tel' => $data['tel'],
                  'address' => $data['address'],
                  'avatar' => $fileName
                ]);
                // Update user
                $user = User::where('id', Auth::user()->id)->update([
                  'password' => bcrypt($data['password'])
                ]);

                $this_user = $this->thisUser();
                return view("auth.profile", ["user"=>$this_user]);
            }
        }
    }

}
