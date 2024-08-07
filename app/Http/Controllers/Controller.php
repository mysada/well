<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{

    use AuthorizesRequests;
    use ValidatesRequests;

    protected function successPage(
      string $message,
      string $routeName
    ): RedirectResponse {
        return Redirect::route($routeName)->with('success', $message);
    }

    protected function errorPage(
      string $message,
      string $routeName,
      array $routeParams = []
    ): RedirectResponse {
        return Redirect::route($routeName, $routeParams)->with(
          'error',
          $message
        );
    }

}
