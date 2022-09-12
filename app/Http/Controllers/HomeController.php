<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.admin.home');
    }
}
