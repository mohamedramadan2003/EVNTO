<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function login(Request $request)
    {

    }
    public function logout(Request $request)
    {

    }
    public function forgotPassword(Request $request)
    {

    }

    public function resetPassword(Request $request)
    {

    }
}
