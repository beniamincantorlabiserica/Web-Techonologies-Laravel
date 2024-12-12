<?php

namespace App\Exceptions\Handler;

public function render($request, Throwable $exception)
{
    if ($request->is('api/*')) {
        return response()->json([
            'message' => $exception->getMessage(),
            'status' => $exception->getCode(),
        ], 500);
    }

    return parent::render($request, $exception);
}
