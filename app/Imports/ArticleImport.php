<?php

namespace App\Imports;

use App\Article;
use App\Helpers\Indexing;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $indexing = new Indexing($row[1]);
        $slug = SlugService::createSlug(Article::class, 'slug', $row[1]);

        return new Article([
            'title' => $row[1],
            'slug' => $slug,
            'full_text' => $row[3],
            'short_text' => $row[2],
            'category_id' => $row[0],
            'indexing' => $indexing->metaphone,
        ]);
    }
}
