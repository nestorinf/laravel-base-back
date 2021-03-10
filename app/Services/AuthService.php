<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthService
{
    /**
     * Const  save token name change .Env
     */
    const TOKEN_NAME = 'LaravelBase8Token';

    /**
     *  Method Signup user
     *  @return array data user new and token
     */
    public static function signup(array $data)
    {
        try {
            $payload = [
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt($data['password'])
            ];

            return self::userInfoAndCreateToken($payload);
        } catch (\Exception $e) {
            return ['Error Server' . $e->getMessage()];
        }
    }

    /**
     *  Method Login Users
     *  @return boolean is case error
     *  @return array data user and token
     */

    public static function login(array $data)
    {
        try {
            if (!Auth::attempt($data)) {
                return false;
            }
            return self::userInfoAndToken();
        } catch (\Exception $e) {
            return ['Error Server' . $e->getMessage()];
        }
    }
    /**
     * Method logout users
     * destroy all tokens user
     * @return boolean
     */

    public static function logout()
    {
        try {
            if (Auth::check()) {
                Auth::user()->tokens->each(function ($token) {
                    $token->revoke();
                });
                return true;
            }
            return false;
        } catch (\Exception $e) {
            return ['Error Server' . $e->getMessage()];
        }
    }

    /**
     * Display Information user Login
     * @return array
     */
    public static function  userInfoAndToken()
    {
        $auth = [];
        $user = Auth::user();
        $auth['access-token'] = $user->createToken(self::TOKEN_NAME)->accessToken;
        $auth['user']         = $user;
        return $auth;
    }

    /**
     * Display information user new
     * @return array
     */
    public static function  userInfoAndCreateToken($payload)
    {
        $auth = [];
        $user = User::create($payload);
        $auth['access-token'] = $user->createToken(self::TOKEN_NAME)->accessToken;
        $auth['user']         = $user;
        return $auth;
    }
}
