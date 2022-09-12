<?php

namespace App\Helpers;

use App\Article;
use App\Category;
use App\Helpers\Indexing;
use Illuminate\Support\Facades\DB;


class ArticleService
{
    // private $indexing;
    // private $keywords;

    public function __construct()
    {
        // $this->keywords = $keywords;
        // $this->indexing = new Indexing($keywords);
    }

    public function getCategoriesbyTagId($tag_id)
    {
        // return Category::whereExists(function ($query1) {
        //     $query1->select(DB::raw("category_id"))
        //         ->from('articles')
        //         ->where(function() {
        //             DB::table("article_tag")
        //             ->select('article_id')
        //             ->distinct()
        //             ->where('tag_id','=',$tag_id)->get();
        //     });
        // });

        $results = DB::select( DB::raw("SELECT `id`,`name`, `slug` FROM categories WHERE id IN(
            SELECT `category_id` FROM articles WHERE id IN (
                SELECT DISTINCT article_id FROM article_tag 
                WHERE tag_id = :tagid
            ))
            ORDER BY `name` ASC"), array(
            'tagid' => $tag_id,
          ));

          return $results;
    }

    public function getCategorieswithoutTags()
    {
        $results = DB::select(DB::raw(
            "SELECT `id`,`name`, `slug` FROM categories WHERE id IN(
                SELECT `category_id` FROM articles WHERE id NOT IN(
                    SELECT DISTINCT article_id 
                    FROM article_tag) 
            AND deleted_at IS NULL)
            ORDER BY `name` ASC"));

        return $results;
    }

    public function selectfetch()
    {
        return Article::where('title', 'LIKE', '%' . $this->keywords  . '%')
                ->pluck('title')
                ->toArray();
    }
}
