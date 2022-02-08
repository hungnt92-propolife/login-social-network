<?php

namespace HungNguyen\LoginSocialNetwork\Repository;

use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialNetworkRepository implements SocialNetworkRepositoryInterface
{

    /**
     * getUserInfoByToken function
     *
     * @param string $accessToken
     * @param string $socialType
     * @return void
     */
    public function getUserByToken(string $accessToken, string $socialType)
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
            return false;
        }
    }
}
