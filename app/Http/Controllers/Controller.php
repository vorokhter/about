<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function authorize(Request $request)
    {
        return $request->session()->has('user');
    }

    public function unauthorizedResponse()
    {
        return self::responseJSON('Не авторизован', 401);
    }

    public static function responseJSON($message, $code)
    {
        return response()->json($message, $code, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
