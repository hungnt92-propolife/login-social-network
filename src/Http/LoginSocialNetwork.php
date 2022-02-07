<?php

namespace HungNguyen\LoginSocialNetwork\Http;

use Exception;
use App\Http\Controllers\Controller;
use HungNguyen\LoginSocialNetwork\Repository\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialNetwork extends Controller implements SocialNetwork
{

    /**
     * userInfo function
     *
     * @param Request $request
     * @return void
     */
    public function userInfo(Request $request)
    {

        $accessToken = $request->get('access_token');
        $socialType = $request->get('social_type');
        if (!$accessToken) {
            return "Access token is required";
        }

        if (!$socialType) {
            return "Social type is required";
        }

        return $this->getUserInfoByToken($accessToken, $socialType);
    }

    /**
     * getUserInfoByToken function
     *
     * @param string $accessToken
     * @param string $socialType
     * @return void
     */
    public function getUserInfoByToken(string $accessToken, string $socialType)
    {
        try {
            $data = Socialite::driver($socialType);
            $user = [];
            if ($data->userFromToken($accessToken)) {
                $user = $data->userFromToken($accessToken);
            }
            return $user;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }
    }
}
