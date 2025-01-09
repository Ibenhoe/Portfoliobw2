<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Category;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
         $faqs = FAQ::all();
        return view('admin.faq.index', compact('faqs'));
    }


     public function create()
    {
        $categories = Category::all();
         return view('admin.faq.create', compact('categories'));
    }


     public function store(Request $request)
   {
      $request->validate([
          'question' => 'required|string',
            'answer' => 'required|string',
            'categories' => 'required|array',
         ]);


       $faq = FAQ::create([
          'question' => $request->question,
           'answer' => $request->answer,
       ]);

     $faq->categories()->attach($request->categories);


       return redirect()->route('admin.faq.index')->with('success', 'FAQ is aangemaakt.');
   }
    public function edit(FAQ $faq)
    {
      $categories = Category::all();
        return view('admin.faq.edit', compact('faq','categories'));
     }

   public function update(Request $request, FAQ $faq)
      {
       $request->validate([
          'question' => 'required|string',
            'answer' => 'required|string',
            'categories' => 'required|array',
       ]);

          $faq->update([
           'question' => $request->question,
           'answer' => $request->answer,
       ]);


        $faq->categories()->sync($request->categories);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ is aangepast.');
     }

     public function destroy(FAQ $faq)
     {
      $faq->delete();
         return redirect()->route('admin.faq.index')->with('success', 'FAQ is verwijderd.');
    }

 }