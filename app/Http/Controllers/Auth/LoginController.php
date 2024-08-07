<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * LoginController constructor.
     *
     * Apply guest middleware to all routes except logout
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle actions after a user is authenticated.
     *
     * @param Request $request
     * @param mixed $user
     * @return void
     */

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
}
