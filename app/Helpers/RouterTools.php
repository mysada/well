<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class RouterTools
{

    /**
     * Set a success message and redirect to the specified route.
     *
     * @param  string  $message
     * @param  string  $routeName
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function success(
      string $message,
      string $routeName
    ): RedirectResponse {
        return Redirect::route($routeName)->with('success', $message);
    }

    /**
     * Set an error message and redirect to the specified route.
     *
     * @param  string  $message
     * @param  string  $routeName
     * @param  array  $routeParams
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function error(
      string $message,
      string $routeName,
      array $routeParams = []
    ): RedirectResponse {
        return Redirect::route($routeName, $routeParams)->with(
          'error',
          $message
        );
    }

    /**
     * Set an error message and redirect back to the previous page.
     *
     * @param  string  $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function errorBack(string $message): RedirectResponse
    {
        return Redirect::back()->with('error', $message);
    }

    /**
     * Set a success message and redirect back to the previous page.
     *
     * @param  string  $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function successBack(string $message): RedirectResponse
    {
        return Redirect::back()->with('success', $message);
    }

}
