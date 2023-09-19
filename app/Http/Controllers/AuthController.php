<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function registerForm() {
        return view('auth.register');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at == null){
            return redirect('/')->with('error', 'Sorry your email is not verified yet or does not exist!');
        }

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        // if(auth()->attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.'
        // ])->onlyInput('email');

        if(!$login){
            return back()->with('error', 'Invalid credentials');
        }
        return redirect('/dashboard');
    }

    public function register(Request $request) {
        $fields = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $fields['remember_token'] = Str::random(24);

        $user = User::create($fields);

        Mail::send('auth.verification-mail', ['user' => $user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->subject('Account Verification');

        });
        return redirect('/')->with('message', 'Your account has been created. Please check your email for verification.');
    }


    public function verification(User $user, $token)
    {
        if($user->remember_token !== $token) {
            return redirect('/')->with('error', 'Invalid token.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account has been verified.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
