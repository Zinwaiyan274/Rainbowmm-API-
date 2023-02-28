<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostReaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // article data
    public function article(Request $request){
        $category = Category::where('title',$request->category)->first();
        //with category request
        if($category){
        $article = Post::where('category_id',$category->id)
                ->with('PostContents')
                ->with(['PostReactions'=>function ($q){
                    $q->join('users','post_reactions.user_id','users.id');
                }])
                ->paginate(6);
        foreach($article as $a){
            $total_like = PostReaction::where('post_id',$a->id)->where('like',true)->count();
            $total_comment = PostReaction::where('post_id',$a->id)->where('comment','!=',null)->get();
        }

        }else{
        $article = Post::where('category_id',1)
                ->with('PostContents')
                ->with('PostReactions')
                ->paginate(6);
        foreach($article as $a){
            $total_like = PostReaction::where('post_id',$a->id)->where('like','true')->count();
            $total_comment = PostReaction::where('post_id',$a->id)->where('comment','!=',null)->get();
        }

        }

        return response()->json([
            'status' => true,
            'data' => ['article'=>$article,'total_like'=>$total_like,'total_comment'=>count($total_comment)]
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
