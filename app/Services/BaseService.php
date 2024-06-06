<?php
// app/Services/ResponseService.php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class BaseService
{

    public static function responsebc($result, $message, $statusCode, $data = []): JsonResponse
    {
        return response()->json([
            'result' => $result,
            'message' => $message,
            'data' => $data ?: "",
        ], $statusCode);
    }
}