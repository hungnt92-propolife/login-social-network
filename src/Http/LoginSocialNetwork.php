<?php

namespace HungNguyen\LoginSocialNetwork\Http;

use App\Http\Controllers\Controller;
use HungNguyen\LoginSocialNetwork\Repository\SocialNetworkRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginSocialNetwork extends Controller
{

    protected $socialNetwork;

    public function __construct(SocialNetworkRepository $socialNetworkRepository)
    {
        $this->socialNetwork = $socialNetworkRepository;
    }

    /**
     * getUserInfo function
     *
     * @param Request $request
     * @return void
     */
    public function getUserInfo(Request $request)
    {

        $accessToken = $request->get('access_token');
        $socialType = $request->get('social_type');
        if (!$accessToken) {
            return response()->json(['messages' => 'Access token is required'], Response::HTTP_BAD_REQUEST);
        }

        if (!$socialType) {
            return response()->json(['messages' => 'Social type is required'], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->socialNetwork->getUserByToken($accessToken, $socialType);

        if ($user) {
            return response()->json(['data' => $user], Response::HTTP_OK);
        }

        return response()->json(['messages' => 'User or driver not found'], Response::HTTP_NOT_FOUND);
    }
}
