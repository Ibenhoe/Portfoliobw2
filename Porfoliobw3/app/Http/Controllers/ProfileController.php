<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('home.profielpagina', compact('user'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user information
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
         if ($request->filled('birthday')) {
            $user->birthday = $request->birthday;
         }
        if ($request->filled('about_me')) {
           $user->about_me = $request->about_me;
        }

        if ($request->hasFile('profile_picture')) {
           // Delete old profile picture if exist
            if($user->profile_picture){
                Storage::disk('public')->delete($user->profile_picture);
            }
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}