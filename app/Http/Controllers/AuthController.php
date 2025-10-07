<?php

namespace App\Http\Controllers;


use Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades;
use Notification;
use App\Notifications\EmailNotification;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;


class AuthController extends Controller
{

   

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        return $response == Password::PASSWORD_RESET
                    ? redirect()->route('/login')->with('status', trans($response))
                    : back()->withErrors(['email' => trans($response)]);
    }


    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        event(new PasswordReset($user));
    }

    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function validationErrorMessages()
    {
        return [];
    }

}
