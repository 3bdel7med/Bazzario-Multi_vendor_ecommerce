<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => ['nullable', 'string', 'max:255'],
        'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'first_name' => ['nullable', 'string', 'max:255'],
        'last_name' => ['nullable', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:255'],
        'address' => ['nullable', 'string', 'max:255'],
        'avatar' => ['nullable', 'image', 'max:2048'],
    ]);

    // 2. Update the main user model fields
    $user->update($request->only(['name', 'email']));

    // 3. Prepare the profile data array first
    $profileData = $request->only(['first_name', 'last_name', 'phone', 'address']);

    // 4. Process the file upload BEFORE saving to the database
    if ($request->hasFile('avatar')) {
        // Delete the old physical file if it exists
        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete('avatars/' . $user->profile->avatar);
        }

        // Store file and extract name
        $path = $request->file('avatar')->store('avatars', 'public');
        $avatarName = basename($path);

        // Inject the generated filename into the data array
        $profileData['profile_picture'] = $avatarName;
    }

    // 5. Run a SINGLE updateOrCreate operation containing all profile fields
    $user->profile()->updateOrCreate(
        ['user_id' => $user->id],
        $profileData
    );

    return redirect()->back()->with('success', 'Profile updated successfully.');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
