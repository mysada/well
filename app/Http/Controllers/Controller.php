<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

/**
 * Base controller for the application.
 *
 * This controller is used as the base for all other controllers in the application.
 * It includes authorization and validation functionalities by using the corresponding traits.
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
