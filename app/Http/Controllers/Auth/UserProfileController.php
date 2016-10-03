<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class UserProfileController extends Controller
{
    public $id = 21;

    // Validation reg form
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|unique:users',
            'password' => 'confirmed|min:6',
        ]);
    }

    public function thisUser()
    {
        $user = DB::table('users')
            ->join('profile', function ($join) {
                $join->on('users.id', '=', 'profile.user_id')
                    ->where('profile.user_id', '=', $this->id);
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
        $validator = $this->validator($request->all());
        $data = $request->all();
        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator);
        } else {
            $user_profile = Profile::where('user_id', $this->id)->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'age' => $data['age'],
                'tel' => $data['tel'],
                'address' => $data['address']
            ]);
            $user = User::where('id', $this->id)->update([
                'password' => bcrypt($data['password'])
            ]);
            $this_user = $this->thisUser();
            return view("auth.register", ["user"=>$this_user]);
        }
    }

}
