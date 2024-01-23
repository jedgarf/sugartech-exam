<?php

namespace App\Http\Controllers;

// Models
use App\Models\UserAuth;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login Authentication.
     *
     * * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->post("username");
        $pasword = $request->post("password");

        $user = UserAuth::where('username', $username)
             ->select('id', 'password')
             ->first();

        if ($user) {

            // Validate password
            if (Hash::check($pasword, $user->password)) {
                
                // saving sessions
                Session::put('is_auth', true);
                Session::put('user_id', $user->id);
                return redirect('/dashboard');

            } else {
                // Passwords do not match
                return redirect('/')->with('loginMsg', 'Incorrect username or password.');
            }

        } else {
            return redirect('/')->with('loginMsg', 'Incorrect username or password.');
        }
    }

    /**
     * Logout user.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //Destroy login session
        Session::forget('is_auth');
        Session::forget('user_id');
        return redirect('/');
    }
}
