<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleView;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function show($slug, $article)
    {
        $article = Article::with(['tags', 'category'])
            ->withCount('tags')
            ->whereId($article)
            ->first();

        $article->timestamps = false;
        $article->views_count++;
        $article->save();

        $article_view_data = array(
            'article_id' => $article->id,
            'user_id' => Auth::User()->id ?? null,
        );

        //article view log create        
        ArticleView::create($article_view_data);

        return view('articles.show', compact('article'));
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->input('title',''));

        return response()->json(['slug' => $slug]);
    }
}
