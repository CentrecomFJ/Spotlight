<?php

namespace App\Helpers;

use App\Article;
use App\Helpers\Indexing;

class Search
{
    private $indexing;
    private $keywords;

    public function __construct($keywords)
    {
        $this->keywords = $keywords;
        $this->indexing = new Indexing($keywords);
    }

    public function fetch()
    {
        return Article::where('indexing', 'LIKE', '%' . $this->indexing->metaphone . '%')
                ->orWhere('title', 'LIKE', '%' . $this->keywords  . '%')
                ->paginate(9);
    }

    public function selectfetch()
    {
        return Article::where('title', 'LIKE', '%' . $this->keywords  . '%')
                ->pluck('title')
                ->toArray();
    }
}
