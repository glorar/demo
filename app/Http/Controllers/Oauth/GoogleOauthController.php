<?php

namespace App\Http\Controllers\Oauth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\GoogleOauthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleOauthController extends Controller
{
    public function url()
    {
        $url = (new GoogleOauthService())->getUrl();

        return response()->json([
            'url' => $url
        ]);
    }

    public function handler(Request $request)
    {
        $code = $request->input('code');
        $token = (new GoogleOauthService())->getToken($code);
        $userInfo = (new GoogleOauthService())->getUserInfo($token);

        $user = User::where('email', $userInfo['email'])->first();

        if (!$user) {
            $user = User::factory()->create([
                'email' => $userInfo['email'],
                'name' => $userInfo['name'],
            ]);
        }

        Auth::login($user);

        return redirect('/');
    }
}
