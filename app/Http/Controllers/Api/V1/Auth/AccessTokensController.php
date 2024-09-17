<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\LoginRequest;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokensController extends Controller
{
    public function register(RegisterRequest $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response([
                'message' => 'Email already exists',
                'status' => 'failed'
            ], 409);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('apptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'Registration Success',
            'status' => 'success'
        ];

        return response($response, 201);

    }
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                'token' => $token,
                'message' => 'Login Success',
                'status' => 'success'
            ], 200);
        }

        return response([
            'message' => 'The Provided Credentials are incorrect',
            'status' => 'failed'
        ], 401);

    }
    public function logout(Request $request)
    {
        // Get bearer token from the request
        $accessToken = $request->bearerToken();

        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);
        // Revoke token
        if ($token)
        {// Revoke token
            $token->delete();
            return response([
                'message' => 'Logout Success',
                'status' => 'success'
            ], 200);
        }

        return response([
            'message' => 'Token not found',
            'status' => 'failed'
        ], 404);
    }
    public function forgotPassword(Request $request)
    {

    }

    public function resetPassword(Request $request)
    {

    }
}
