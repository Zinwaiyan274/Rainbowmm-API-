<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article(){
        $article = Post::with('postContents')->get();
        return response()->json([
            'status'=>true,
            'data'=>$article
        ]);
    }
}
