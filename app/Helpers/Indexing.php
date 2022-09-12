<?php

namespace App\Helpers;

class Indexing
{
    public $content;
    public $metaphone;

    public function __construct($content)
    {
        $this->content = $content;
        $this->splitStringContents();
        $this->buildMetaphone();
    }

    public function buildMetaphone()
    {
        $words = $this->splitStringContents();
        $metaphone = "";

        foreach ($words as $word) {
            $metaphone .= metaphone($word) . " ";
        }

        $this->metaphone = trim($metaphone);
    }

    public function splitStringContents()
    {
        return preg_split('/\W+/', $this->content);
    }
}
