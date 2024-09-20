<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User\User;
use App\Models\User\UserInterest;
use App\Models\User\UserProfile;
use App\Models\User\UserSkill;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(UpdateUserProfileRequest $request)
    {
        $user = auth()->user();
        $validated = $request->validated();

        $user->update(['name' => $validated['name']]);
        $profile = UserProfile::firstOrNew(['user_id' => $user->id]);
        $profile->collage_name = $validated['collage_name'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $profile->image = $imagePath;
        }

        $profile->save();

        UserSkill::where('user_id', $user->id)->delete(); // Clear old skills
        if ($request->has('skills')) {
            foreach ($validated['skills'] as $skill) {
                UserSkill::create([
                    'skill' => $skill,
                    'user_id' => $user->id,
                ]);
            }
        }

        UserInterest::where('user_id', $user->id)->delete(); // Clear old interests
        if ($request->has('interests')) {
            foreach ($validated['interests'] as $interest) {
                UserInterest::create([
                    'interest' => $interest,
                    'user_id' => $user->id,
                ]);
            }
        }

        return response()->json(['message' => 'Profile updated successfully!'], 200);
    }
}
