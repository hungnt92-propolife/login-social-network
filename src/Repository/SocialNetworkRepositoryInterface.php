<?php

namespace HungNguyen\LoginSocialNetwork\Repository;

use Illuminate\Http\Request;

interface SocialNetworkRepositoryInterface
{
    /**
     * getUserByToken function
     *
     * @param Request $request
     * @return void
     */
    public function getUserByToken(string $accessToken, string $socialType);
}
