<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        // Flash message for successful login
        session()->flash('success', 'Login successful! Welcome back.');
    }

    protected function loggedOut()
    {
        // Flash message for successful logout
        session()->flash('success', 'Logout successful! See you again soon.');
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login')->with('title', 'Login');
    }
}
