<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleOauthService
{
    public function getUrl()
    {
        $params = [
            'redirect_uri' => config('oauth.google.redirect'),
            'response_type' => 'code',
            'client_id' => config('oauth.google.id'),
            'scope' => implode(' ', config('oauth.google.scopes'))
        ];

        return config('oauth.google.url.auth') . '?' . http_build_query($params);

    }

    public function getToken(string $code)
    {
        $endpoint = config('oauth.google.url.token');

        $params = [
            'client_id' => config('oauth.google.id'),
            'client_secret' => config('oauth.google.secret'),
            'redirect_uri' => config('oauth.google.redirect'),
            'grant_type' => 'authorization_code',
            'code' => $code,
        ];

        $response = Http::acceptJson()->asForm()->post($endpoint, $params);

        return $response->json('access_token');
    }

    public function getUserInfo(string $token): array
    {
        $endpoint = config('oauth.google.url.user_info');

        $response = Http::acceptJson()->withToken($token)->get($endpoint);

        return [
            'email' => $response->json('email'),
            'name' => $response->json('name'),
        ];
    }

}
