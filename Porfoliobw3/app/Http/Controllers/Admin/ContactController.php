<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Contact; // Ensure that the Contact model exists in this namespace

 class ContactController extends Controller
{
    public function index()
    {
       $contacts = Contact::all();
      return view('admin.contacts.index', compact('contacts'));
     }
}