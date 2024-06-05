<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Cấu hình base Method
    public function responsebc($result, $message, $statusCode, $data = [])
    {
        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data ?: "",
        ], $statusCode);
    }
}