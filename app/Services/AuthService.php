<?php

namespace App\Services;
use App\Models\User;

class AuthService
{
    protected $user;
    /**
     * Method Static Logic Register User
     */
    // public function  __constructor(User $user) {
    //     $this->user = $user;
    // }
    public static function signup(array $data) {
        $payload = [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password'])
        ];
        $users = User::create($payload);
        $token = $users->createToken('LaravelBaseToken8')->accessToken;
        return [
            $users, $token
        ];
    }
}
