<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

//    protected function authenticated()
//    {
//        // Flash message for successful login
//
//        session()->flash('success', 'Login successful! Welcome back.');
//    }

    protected function authenticated($request, $user)
    {
        // Flash message for successful login
        session()->flash('success', 'Login successful! Welcome back.');

        $role = $user->isAdmin() ? 'Admin' : 'User';

        Log::info("{$role} logged in", [
            'user_id' => $user->id,
            'name' => $user->name,
        ]);
    }

    protected function loggedOut($request)
    {
        // Get the user ID and name before logging out
        $userId = Auth::id();
        $userName = Auth::user() ? Auth::user()->name : 'Unknown';
        $role = Auth::user() && Auth::user()->isAdmin() ? 'Admin' : 'User'; // Check if the user is an admin

        // Flash message for successful logout
        session()->flash('success', 'Logout successful! See you again soon.');

        // Log the user logout with user ID, name, and role
        \Log::info("{$role} logged out", [
            'user_id' => $userId,
            'name' => $userName,
        ]);

        return redirect('/');

    }

    public function showLoginForm()
    {
        return view('auth.login')->with('title', 'Login');
    }
}
