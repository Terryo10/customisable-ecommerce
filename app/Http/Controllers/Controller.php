<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function jsonError($statusCode = 500, $message = "Unexpected Error", $data = [], $key): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "success" => false,
            "status" => $statusCode,
            "message" => $message,
            $key => $data,
        ], $statusCode);
    }

    public function jsonSuccess($statusCode = 200, $message = "Request Successful", $data = [], $key): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "success" => true,
            "status" => $statusCode,
            "message" => $message,
            $key => $data
        ], $statusCode);
    }
}
