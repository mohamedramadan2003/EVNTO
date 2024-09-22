<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Organizer\OrganizerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(OrganizerProfile $profile)
    {
        return view('dashboard.profile.edit',compact('profile'));
    }

    public function update(Request $request)
    {
        // Get the authenticated organizer
        $organizer = Auth::guard('organizer')->user();
        $organizerId = $organizer->id;

        // Validate the input fields
        $validatedData = $request->validate([
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Prepare the data for update or create
        $data = [
            'facebook_link' => $validatedData['facebook_link'],
            'linkedin_link' => $validatedData['linkedin_link'],
            'twitter_link' => $validatedData['twitter_link'],
        ];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/profiles', 'public');
            $data['image'] = $imagePath;

            // Optionally delete the old image
            $oldProfile = OrganizerProfile::where('organizer_id', $organizerId)->first();
            if ($oldProfile && $oldProfile->image) {
                Storage::disk('public')->delete($oldProfile->image);
            }
        }

        // Use updateOrCreate to update existing profile or create a new one
        OrganizerProfile::updateOrCreate(
            ['organizer_id' => $organizerId], // Condition to find the record
            $data // Data to update or create
        );

        // Redirect back with success message
        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully.');
    }


}
