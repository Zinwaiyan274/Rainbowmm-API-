<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // articles list page
    public function articlesPage(){
        return view('articles');
    }

    // upload article page
    public function uploadArticle(){
        return view('uploadArticle');
    }
}
