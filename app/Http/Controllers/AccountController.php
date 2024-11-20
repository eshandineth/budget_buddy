<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Method to delete the account
    public function delete(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Delete the user's account
        $user->delete();

        // Log the user out
        Auth::logout();

        // Redirect to the homepage or a custom page
        return redirect('/')->with('status', 'Your account has been deleted successfully.');
    }

    public function manage()
{
    return view('user.manageProfile');  // Assuming 'manageProfile.blade.php' is inside the 'user' folder
}



public function updateProfile(Request $request) 
{
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'phone_number' => 'nullable|string|max:15', // Add validation for phone_number
        'district' => 'nullable|string|max:255',    // Add validation for district
        'city' => 'nullable|string|max:255',        // Add validation for city
    ]);

    $user = Auth::user();

    // Update fields
    $user->name = $request->input('name');
    $user->phone_number = $request->input('phone_number');
    $user->district = $request->input('district');
    $user->city = $request->input('city');

    // Update the password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    // Update the profile image if uploaded
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imagePath = $image->store('profile_images', 'public');
        $user->profile_image = $imagePath;
    }

    $user->save();

    return redirect()->back()->with('status', 'Profile updated successfully.');
}



    
}
