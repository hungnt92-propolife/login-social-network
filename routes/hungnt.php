<?php

use HungNguyen\LoginSocialNetwork\Http\LoginSocialNetwork;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('api/user/byToken', [LoginSocialNetwork::class, 'userInfo']);
});

