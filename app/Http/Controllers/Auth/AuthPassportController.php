<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\Login\{SignupRequest, LoginRequest};
use App\Http\Controllers\ResponseController;


class AuthPassportController extends Controller
{

    /**
     * Registration User Method
     * @param name, email and password
     * @return array
     */

    public function registerUser(SignupRequest $request)
    {
        try {
            $user = AuthService::signup($request->all());
            if ($user) {
                return ResponseController::sendSuccess($user);
            }
        } catch (\Exception $e) {
            return  ResponseController::sendError([
                'Error Server ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * Method login user
     * @param email and password
     * @return array
     */
    public function login(LoginRequest $request)
    {
        try {
            $user = AuthService::login($request->all());
            if (!$user) {
                return  ResponseController::sendError(['credential not found. Verify email and password'], 401);
            }
            return  ResponseController::sendSuccess($user);
        } catch (\Exception $e) {
            return  ResponseController::sendError([
                'Error Server ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * success data apply to the request.
     *
     * @return message
     * @return boolean [success true or false]
     */
    public function logout()
    {

        try {
            if (!AuthService::logout()) {
                return  ResponseController::sendError(['Unauthenticated'], 401);
            }
            return  ResponseController::sendSuccess(['success logout']);
        } catch (\Exception $e) {
            return  ResponseController::sendError([
                'Error Server ' . $e->getMessage()
            ], 500);
        }
    }
}
