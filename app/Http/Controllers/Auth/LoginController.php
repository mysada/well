<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
     * @param  Request  $request
     * @param  mixed  $user
     *
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    protected function authenticated($request, $user)
    {
        // Flash message for successful login
        session()->flash('success', 'Login successful! Welcome back.');

        // Redirect admin users to /admin
        if ($user->is_admin) {
            return redirect()->route('admin.home');
        }

        // Redirect regular users back to their intended page
        return redirect()->intended($this->redirectTo);
    }

    protected function loggedOut($request)
    {
        // Retrieve user information before logging out
        //        $user = Auth::user();
        //        $userId = $user ? $user->id : 'Unknown';
        //        $userName = $user ? $user->name : 'Unknown';
        //        $role = $user && $user->isAdmin() ? 'Admin' : 'User';

        // Perform the logout operation
        Auth::logout();

        // Flash message for successful logout
        session()->flash('success', 'Logout successful! See you again soon.');

        // Log the user logout with user ID, name, and role
        //        \Log::info("{$role} logged out", [
        //            'user_id' => $userId,
        //            'name' => $userName,
        //        ]);

        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login')->with('title', 'Login');
    }

}
