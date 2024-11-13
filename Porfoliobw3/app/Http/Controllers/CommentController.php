<?php
namespace App\Http\Controllers;
// App\Http\Controllers\CommentController.php
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        // Validatie
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Haal het nieuwsitem op
        $news = News::findOrFail($newsId);

        // Maak een nieuwe reactie aan en sla deze op
        Comment::create([
            'comment' => $request->content,
            'news_id' => $news->id,
            'user_id' => auth()->id(), // Het id van de ingelogde gebruiker
        ]);

        return redirect()->back(); // Terug naar de pagina
    }
};
