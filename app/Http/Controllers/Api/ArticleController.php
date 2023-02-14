<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // article data
    public function article(){
        $article = Post::with('postContents')->with('postReactions')->paginate(6);

        return response()->json([
            'status' => true,
            'data' => $article
        ]);
    }

    // search article
    public function articleSearch(Request $request){
        $searchKey = $request->searchKey;

        $searchData = Post::where('title', 'like', '%'.$searchKey.'%')
                        ->orWhere('author_name', 'like', '%'.$searchKey.'%')
                        ->with('postContents')
                        ->with('postReactions')
                        ->paginate(6);

        return response()->json([
            'status' => true,
            'data' => $searchData
        ]);
    }
}
