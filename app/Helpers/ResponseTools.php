<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseTools
{
    public static function success($data = [], $message = 'Request was successful.'): JsonResponse
    {
        return response()->json([
          'status' => 'success',
          'message' => $message,
          'data' => $data
        ]);
    }

    public static function error($message = 'An error occurred.', $errors = []): JsonResponse
    {
        return response()->json([
          'status' => 'error',
          'message' => $message,
          'errors' => $errors
        ]);
    }
}
