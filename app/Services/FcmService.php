<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use RuntimeException;

class FcmService
{
    private string $serverKey;

    private string $endpoint;

    public function __construct()
    {
        $this->serverKey = (string) config('services.fcm.server_key');
        $this->endpoint = (string) config('services.fcm.endpoint', 'https://fcm.googleapis.com/fcm/send');
    }

    /**
     * Kirim notifikasi ke satu device token.
     *
     * @param  string  $token
     * @param  string  $title
     * @param  string  $body
     * @param  array<string, mixed>  $data
     */
    public function sendToToken(string $token, string $title, string $body, array $data = []): array
    {
        if ($this->serverKey === '') {
            throw new RuntimeException('FIREBASE_SERVER_KEY belum diset di file .env');
        }

        $payload = [
            'to' => $token,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
            'data' => $data,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'key='.$this->serverKey,
            'Content-Type' => 'application/json',
        ])->post($this->endpoint, $payload);

        $this->throwIfFailed($response);

        return $response->json() ?? [];
    }

    /**
     * Kirim notifikasi ke banyak device token sekaligus.
     *
     * @param  string[]  $tokens
     * @param  string  $title
     * @param  string  $body
     * @param  array<string, mixed>  $data
     */
    public function sendToMany(array $tokens, string $title, string $body, array $data = []): array
    {
        if ($this->serverKey === '') {
            throw new RuntimeException('FIREBASE_SERVER_KEY belum diset di file .env');
        }

        $payload = [
            'registration_ids' => $tokens,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
            'data' => $data,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'key='.$this->serverKey,
            'Content-Type' => 'application/json',
        ])->post($this->endpoint, $payload);

        $this->throwIfFailed($response);

        return $response->json() ?? [];
    }

    private function throwIfFailed(Response $response): void
    {
        if (! $response->successful()) {
            throw new RuntimeException(
                sprintf('Gagal mengirim notifikasi FCM: HTTP %s - %s', $response->status(), $response->body())
            );
        }
    }
}

