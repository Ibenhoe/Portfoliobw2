<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
   public function index()
   {
      $newsItems = News::all();
       return view('admin.news.index', compact('newsItems'));
  }

  public function create()
    {
       return view('admin.news.create');
  }

       public function store(Request $request)
     {
         $request->validate([
            'title' => 'required|string|max:255',
          'content' => 'required|string',
          'published_at' => 'required|date',
          'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);


     $filePath = null;
        if ($request->hasFile('image')) {
          $filePath = $request->file('image')->store('news_images', 'public');
        }

      News::create([
         'title' => $request->title,
           'content' => $request->content,
            'published_at' => $request->published_at,
         'image' => $filePath
       ]);

     return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem is aangemaakt.');
    }

     public function edit(News $news)
    {
          return view('admin.news.edit', compact('news'));
    }
     public function update(Request $request, News $news)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       if ($request->hasFile('image')) {
            if($news->image){
              Storage::disk('public')->delete($news->image);
           }
         $filePath = $request->file('image')->store('news_images', 'public');
          $news->image = $filePath;
        }


        $news->update([
         'title' => $request->title,
          'content' => $request->content,
            'published_at' => $request->published_at,
        ]);


       return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem is aangepast.');
      }
      public function destroy(News $news)
    {
           if($news->image){
              Storage::disk('public')->delete($news->image);
         }
        $news->delete();
       return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem is verwijderd.');
  }
}