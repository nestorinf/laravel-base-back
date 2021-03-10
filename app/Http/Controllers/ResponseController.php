<?php

namespace App\Http\Controllers;

class ResponseController extends Controller
{

    /**
     * success data apply to the request.
     *
     * @return array
     */
    public static function sendSuccess($data, $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $data
        ];
        return response()->json($response, $code);
    }

    /**
     * error data apply to the request.
     *
     * @return array
     */

    public static function sendError($error, $code = 400)
    {
        $response = [
            'success' => false,
            'error'    => $error
        ];
        return response()->json($response, $code);
    }
}
