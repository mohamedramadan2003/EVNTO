<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\put;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with([
                'skills:skill,user_id',
                'interests:interest,user_id',
                'profile:user_id,collage_name'
            ])->get();

        return UserResource::collection($users);
    }

        public function storeUserInfo(UserInfoRequest $request)
        {
            DB::beginTransaction();

            try {
                $user = auth()->user();
                $user->saveUserInfo(
                    $request->user_college,
                    $request->user_skills,
                    $request->user_interests
                );

                DB::commit();

                return response()->json(['message' => 'User info stored successfully.']);
            } catch (\Exception $e) {

                DB::rollback();

                return response()->json(['error' => 'Failed to stored user info.'], 500);
            }
        }

}
