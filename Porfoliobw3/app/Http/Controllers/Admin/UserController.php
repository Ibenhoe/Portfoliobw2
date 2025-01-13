<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

   public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
   {
        $request->validate([
             'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|int',
       ]);

       $is_admin = $request->is_admin ? 1 : 0;
        Log::info('Store user: ', ['is_admin' => $is_admin]);
        User::create([
             'name' => $request->name,
             'email' => $request->email,
               'password' => Hash::make($request->password),
             'is_admin' => $is_admin,
        ]);

     return redirect()->route('admin.users.index')->with('success', 'Gebruiker is aangemaakt.');
  }

     public function edit(User $user)
     {
        return view('admin.users.edit', compact('user'));
      }

  public function update(Request $request, User $user)
   {
         $request->validate([
             'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
             'is_admin' => 'nullable|int',
         ]);
         $is_admin = $request->is_admin ? 1 : 0;
        Log::info('Update user: ', ['is_admin' => $is_admin]);

       $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $is_admin,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker is aangepast.');
    }

    public function destroy(User $user)
   {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker is verwijderd.');
    }
}