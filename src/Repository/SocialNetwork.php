<?php 
namespace HungNguyen\LoginSocialNetwork\Repository;

interface SocialNetwork {
    /**
     * getUserInfoByToken function
     *
     * @param string $accessToken
     * @param string $socialType
     * @return void
     */
    public function getUserInfoByToken(string $accessToken,string $socialType);
}