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
                ->withCount(['PostReactions as total_comment'=>function($q){
                    $q->where('comment','!=',null);
                }])
                ->withCount(['PostReactions as total_like'=>function($q){
                    $q->where('like',true);
                }])
                ->paginate(6);
        }else{
        $article = Post::where('category_id',1)
                ->with('PostContents')
                ->with(['PostReactions'=>function ($q){
                    $q->join('users','post_reactions.user_id','users.id');
                  }])
                ->withCount(['PostReactions as total_comment'=>function($q){
                    $q->where('comment','!=',null);
                }])
                ->withCount(['PostReactions as total_like'=>function($q){
                    $q->where('like',true);
                }])
                ->paginate(6);
        }

        return response()->json([
            'status' => true,
            'data' => ['article'=>$article]
        ]);
    }

    // search article
    public function articleSearch(Request $request){
        $searchKey = $request->searchKey;

        $article = Post::where('title', 'like', '%'.$searchKey.'%')
                        ->orWhere('author_name', 'like', '%'.$searchKey.'%')
                        ->with('postContents')
                        ->with(['PostReactions'=>function ($q){
                            $q->join('users','post_reactions.user_id','users.id');
                          }])
                        ->withCount(['PostReactions as total_comment'=>function($q){
                            $q->where('comment','!=',null);
                        }])
                        ->withCount(['PostReactions as total_like'=>function($q){
                            $q->where('like',true);
                        }])
                        ->paginate(6);

        return response()->json([
            'status' => true,
            'data' => ['article'=>$article]
        ]);
    }
}
