<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\ArticleService;
use App\Tag;


use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')
            ->with(['articles' => function ($query) {
                $query->orderBy('id');
            }])
            ->paginate(10);

        $tags = Tag::withCount('articles')
            ->with(['articles' => function ($query) {
                $query->orderBy('id');
            }])
            ->paginate(10);

        $article_service = new ArticleService();
        $noTagCategories = $article_service->getCategorieswithoutTags();

        return view('index', compact('categories', 'tags', 'noTagCategories'));
    }
}