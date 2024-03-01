<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseAPI
{
    public function coreResponse(string $message, int $statusCode, array $data = [], bool $isSuccess = true): JsonResponse
    {
        if (! $message) {
            return response()->json(['message' => 'Message is required'], 500);
        }

        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'results' => $data,
            ], $statusCode);
        }

        return response()->json([
            'message' => $message,
            'error' => true,
            'code' => $statusCode,
        ], $statusCode);
    }

    public function success(string $message, array $data, int $statusCode = 200): JsonResponse
    {
        return $this->coreResponse($message, $statusCode, $data);
    }

    public function error(string $message, int $statusCode = 500): JsonResponse
    {
        return $this->coreResponse($message, $statusCode, [], false);
    }
}
