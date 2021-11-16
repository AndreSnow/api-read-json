<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait Tests
{
    public function artisanComands(array $data = [])
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                \Artisan::call($data);
            }
        } else {
            \Artisan::call('passport:install');
            \Artisan::call('db:seed');
        }
    }

    public function login()
    {
        $credentials = [
            'email' => 'andre@teste.com',
            'password' => '12345678'
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = $user->createToken($user->email)->accessToken;
            $this->token = $user->token;
        }
    }

    public function headers(string $token)
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer ${token}"
        ];
    }
}
