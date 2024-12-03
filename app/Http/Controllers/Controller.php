<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Paynow\Payments\Paynow;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public $site_url;

    public function __construct()
    {
        $this->site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    }

    public function generateRandomId(): string
    {
        $random_data = "1234567890jefhbeyeaihiuhneiunwurbhihnoahuhrihw";
        return uniqid($random_data);
    }


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

    public function paynow($id = "", $type = "")
    {
        $site_url = $this->site_url;
        $request_url = $_SERVER['REQUEST_URI'];
        return new Paynow(
            env('PAYNOW_INTERGRATION_ID'),
            env('PAYNOW_INTERGRATION_KEY'),
            // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
            "$site_url/check-payment/$id", //return url
            "$site_url/check-payment/$id", //result url
        );
    }
}
