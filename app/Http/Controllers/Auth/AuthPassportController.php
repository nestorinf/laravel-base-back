<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthPassportController extends Controller
{

    /**
     * Registration Method Request
     * @param name, email and password
     */

    public function registerUser(Request $request) {
        $authService = new AuthService();
        $user = $authService->signup($request->all());
        return response()->json(['data' => $user], 200);
    }
}
