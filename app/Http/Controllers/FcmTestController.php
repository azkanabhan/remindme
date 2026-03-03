<?php

namespace App\Http\Controllers;

use App\Services\FcmService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FcmTestController extends Controller
{
    public function __construct(
        private readonly FcmService $fcm,
    ) {
    }

    public function send(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
            'title' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
        ]);

        $title = $validated['title'] ?? 'Tes Notifikasi';
        $body = $validated['body'] ?? 'Notifikasi dari RemindMe';

        $result = $this->fcm->sendToToken(
            $validated['token'],
            $title,
            $body,
        );

        return response()->json([
            'message' => 'Notifikasi FCM berhasil dikirim',
            'fcm_response' => $result,
        ]);
    }
}

