<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function sign_in() {
        session(['message' => 'Hello']);
        return view('sign_in');
    }

    // TODO: Implement Sign Up Page
    public function sign_up() {
        session(['message' => 'Hello']);
        return view('sign_up');
    }

    public function verify(Request $request) {
        if ($request->cookie('logged_in') != null && $request->cookie('logged_in') != '')
            return view('base.main');

        $validated = $request->validate([
            'username' => 'bail|required|unique:table_user,username',
            'password' => 'required',
        ]);

        $hashedPassword = User::get($request->username)->password_hash;

        if (Hash::check($request->password, $hashedPassword)) {
            return redirect('/');
        } else {
            session(['error' => 'Invalid data, please double check your email and password.']);
        }
    }

    public function register(Request $request) {
        if ($request->cookie('logged_in') != null && $request->cookie('logged_in') != '')
            return view('base.main');

        $validated = $request->validate([
            'username' => 'bail|required|unique:table_user,username',
            'password' => 'required',
        ]);

        // TODO: Implement hashing with Argon2id
        $hashed_password = '';

        $user = new User();
        $user->username        = $request->username;
        $user->email           = $request->email;
        $user->password_hash   = $hashed_password;

        // $user->url_profile_pic = $request->url_profile_pic;
        $user->url_profile_pic = '';
        $user->profile_info    = $request->profile_info;
        $user->address         = $request->address;
        $user->phone_number    = $request->phone_number;

        $user->save();

        session(['message' => 'Registration Success']);

        return redirect('/');
    }
}
