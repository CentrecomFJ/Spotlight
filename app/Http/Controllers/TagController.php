<?php

namespace App\Http\Controllers;

use App\Helpers\ArticleService;
use App\Tag;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug, Tag $tag)
    {
        $tag->loadCount('articles');

        $articles = $tag->articles()
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('tags.show', compact(['articles', 'tag']));
    }

    public function show_categories_by_tag($slug, Tag $tag)
    {
        $tag->loadCount('articles');

        $articles = $tag->articles()
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        $article_service = new ArticleService();
        $categories = $article_service->getCategoriesbyTagId($tag->id);

        return view('tags.show_tag_categories', compact(['articles','categories', 'tag']));
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Tag::class, 'slug', $request->input('name', ''));

        return response()->json(['slug' => $slug]);
    }
}
