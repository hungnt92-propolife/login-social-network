# Package get user information with Access Token via Socialite Laravel
## Require
* Laravel 8.x
* Laravel Socialite: ^5.2

If you missing field social_id in your table store user/customer, please run: <br>

`php artisan runMigration: your-table-name up-or-down` <br>

Before install this package, please make sure your application `FACEBOOK_CLIENT_ID` if you login with Facebook or `GOOGLE_CLIENT_ID` if you want to login with Google and insert in `services.php`

```
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_CALLBACK_URL'),
    'scopes' => ['email', 'public_profile'],
],

'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_CALLBACK_URL'),
    'scopes' => ['profile email'],
]
```

or any services if you want to use example github, gitlab, etc...