<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('home.profielpagina', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('home.profielpagina', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user information
        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->about = $request->about;

        if ($request->hasFile('profile_picture')) {
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }

        $user->save();

        return redirect()->route('home.profielpagina', $user)->with('success', 'Profile updated successfully.');
    }
}
