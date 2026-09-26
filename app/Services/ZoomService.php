<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected string $baseUrl = 'https://api.zoom.us/v2';

    private function getAccessToken()
    {
        $response = Http::asForm()
            ->withBasicAuth(
                env('ZOOM_CLIENT_ID'),
                env('ZOOM_CLIENT_SECRET')
            )
            ->post('https://zoom.us/oauth/token', [
                'grant_type' => 'account_credentials',
                'account_id' => env('ZOOM_ACCOUNT_ID'),
            ]);

        return $response->json()['access_token'];
    }

    public function createMeeting($topic)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post($this->baseUrl . '/users/me/meetings', [
                'topic' => $topic,
                'type' => 2,
                'start_time' => now()->addHour()->toIso8601String(),
                'duration' => 60,
                'timezone' => 'Asia/Aden',
                'agenda' => 'Online Class',
                'settings' => [
                    'host_video' => true,
                    'participant_video' => true,
                    'waiting_room' => true,
                ],
            ]);

        return $response->json();
    }

    public function deleteMeeting($meetingId)
    {
    $token = $this->getAccessToken();

    return Http::withToken($token)
        ->delete($this->baseUrl . '/meetings/' . $meetingId);
    }
}