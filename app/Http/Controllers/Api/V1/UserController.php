<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use function Pest\Laravel\put;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['skills:skill','interests:interest'])->get();

        return UserResource::collection($users);
    }

}
