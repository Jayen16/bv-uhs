<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateStaffProfile;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }
    
    

    public function updateStaff(Request $request): RedirectResponse
    {

        $staff = $request; 
        $user = Auth::user();
       
        $affectedRows = Staff::where('staff_id', $user->staff_id)
            ->update([
                'first_name' => $staff->first_name,
                'last_name' => $staff->last_name,
                'specialization' => $staff->specialization,
                'license_no' => $staff->license_no,
                'address' => $staff->address,
                'image_signature'=> $staff->image_signature,
            ]);
    

        return redirect()->route('profile.edit');
    }
    

    
    public function updatePhoto(Request $request): RedirectResponse
    {


        $request->validate([
            'image_user' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $user = Auth::user();

        if ($request->hasFile('image_user')) {
            $imagePath = $request->file('image_user')->store('uploads', 'public');

            $updateUser = User::where('staff_id',$user->staff->id)->first();
            $updateUser->image_user = $imagePath;
            $updateUser->save();
        }

        // return response()->json(['message' => 'Photo updated successfully']);

        return redirect()->route('profile.edit');
    }

   

    // public function updatePhoto(Request $request): RedirectResponse
    // {
    //     // Retrieve staff model
    //     // $staff = $request; 
    //     // $user = Auth::user();
    //      dd($request);
    //     // $affectedRows = Staff::where('staff_id', $user->staff_id)
    //     //     ->update([
    //     //         'first_name' => $staff->first_name,
    //     //         'last_name' => $staff->last_name,
    //     //         'specialization' => $staff->specialization,
    //     //         'license_no' => $staff->license_no,
    //     //         'address' => $staff->address,
    //     //     ]);
    
    //     // // Redirect to the profile edit route
    //     // return redirect()->route('profile.edit');
    // }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
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
