<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
  use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::all();
      return view('admin.categories.index', compact('categories'));
     }


    public function create()
   {
         return view('admin.categories.create');
  }
   public function store(Request $request)
  {
         $request->validate([
             'name' => 'required|string',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

      return redirect()->route('admin.categories.index')->with('success', 'Categorie is aangemaakt.');
 }
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

      $category->update([
        'name' => $request->name,
     ]);

     return redirect()->route('admin.categories.index')->with('success', 'Categorie is aangepast.');
 }

  public function destroy(Category $category)
 {
    $category->delete();
     return redirect()->route('admin.categories.index')->with('success', 'Categorie is verwijderd.');
 }
}