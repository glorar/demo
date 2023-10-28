<?php

namespace App\Services\Zoom;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ZoomRequest
{
    private static function token()
    {
        return Cache::remember('zoom_token', 55 * 60, function () {
            $params = [
                'grant_type' => 'account_credentials',
                'account_id' => config('zoom.account_id'),
            ];

            $response = Http::withBasicAuth(config('zoom.client_id'), config('zoom.client_secret'))
                ->asForm()
                ->acceptJson()
                ->post(config('zoom.token_path'), $params);

            return $response->json('access_token');
        });
    }

    public function get(string $url)
    {
        $path = config('zoom.base_path') . '/' . $url;

        return Http::withToken(self::token())->acceptJson()->get($path)->json();
    }

    public function post(string $url, array $params)
    {
        $path = config('zoom.base_path') . '/' . $url;

        return Http::withToken(self::token())->acceptJson()->post($path, $params)->json();
    }

    public function patch(string $url, array $params)
    {
        $path = config('zoom.base_path') . '/' . $url;

        return Http::withToken(self::token())->acceptJson()->patch($path, $params)->json();
    }

    public function delete($url)
    {
        $path = config('zoom.base_path') . '/' . $url;

        return Http::withToken(self::token())->acceptJson()->delete($path)->json();
    }

}
