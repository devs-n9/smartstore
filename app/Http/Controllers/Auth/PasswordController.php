<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    use ResetsPasswords;

//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    // Get form
    public function getEmail()
    {
        return view('auth.passwords.email');
    }

    // Post
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
            $message->from('mr.korg@ya.ru', 'Smartstore');
        });
        switch ($response) {
            case Password::RESET_LINK_SENT:
                return view('auth.register.message', ['message'=>'Check your email to reset your password click on the link in the email.']);
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    // Email subject
    protected function getEmailSubject()
    {
        return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
    }

    // Get reset page
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('auth.passwords.reset')->with('token', $token);
    }

    // Reset password
    public function postReset(Request $request)
    {
        $this->validate($request, [
          'token' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
          'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect('/profile');
            default:
                return redirect()->back()
                  ->withInput($request->only('email'))
                  ->withErrors(['email' => trans($response)]);
        }
    }

    protected static function getFacadeAccessor()
    {
        return 'auth.passwords.reset';
    }


}
