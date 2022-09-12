<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = $this->articlesWithin24Hrs();

        return view('admin.home', compact('articles'));
    }

    private function articlesWithin24Hrs()
    {
        $date = new \DateTime(); // For today/now, don't pass an arg.
        $date->modify("-1 day");
        $date_24hrsago = $date->format("Y-m-d H:i:s");
        $articles = Article::where('updated_at', '>=',  $date_24hrsago)
            ->orderBy('updated_at', 'desc')->get();

        return $articles;
    }

    private function dailyCallEntries(){
        
    }
}
