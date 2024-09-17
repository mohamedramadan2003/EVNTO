<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\ForgotPasswordRequest;
use App\Http\Requests\api\Auth\LoginRequest;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Mail\VerificationCodeMail;
use App\Models\User\PasswordReset;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        set_time_limit(120);
        $email = $request->validated()['email'];

        $code = rand(10000, 99999);
        Mail::to($email)->send(new VerificationCodeMail($code));

        PasswordReset::updateOrCreate(
            ['email' => $email], // This will ensure no duplicates for the same email
            ['token' => $code, 'created_at' => now()] // Update the code; created_at will be set automatically
        );

        return response()->json([
            'code' => $code,
            'message' => 'Verification code sent to your email.',
            'status' => 'success'
        ], 200);
    }

//        PasswordReset::create([
//            'email'=>$email,
//            'token'=>$code,
//            'created_at'=>Carbon::now()
//        ]);



    public function resetPassword(Request $request)
    {

    }
}
