<?php 
namespace HungNguyen\LoginSocialNetwork\Http;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialNetwork extends Controller
{
        
    /**
     * getUserInfoByToken
     *
     * @param  mixed $accessToken
     * @param  mixed $socialType
     * @return void
     */
    public function getUserInfoByToken($accessToken, $socialType)
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
        }
    }
}