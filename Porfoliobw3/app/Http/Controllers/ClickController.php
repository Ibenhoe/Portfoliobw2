<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClickController extends Controller
{
  public function store(Request $request)
  {
      $user = Auth::user();

      // Haal het klikrecord op of maak een nieuwe
      $click = $user->clicks()->first() ?? $user->clicks()->create(['click_count' => 0]);

      // Verhoog de klikcount (admin: 2 klikken per keer)
      $increment = $user->is_admin ? 2 : 1;
      $click->increment('click_count', $increment);

      // Optioneel: om een nieuwe waarde door te geven
      return redirect()->back()->with('success', 'Klik opgeslagen!');
  }
}