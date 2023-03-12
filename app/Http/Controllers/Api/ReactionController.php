<?php

namespace App\Http\Controllers\Api;

use App\Models\PostReaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReactionController extends Controller
{
    public function saveReaction(Request $request){
        $data = $this->getData($request);
        $check_reaction = PostReaction::where('post_id',$request->post_id)
                    ->where('user_id',$request->user_id)
                    ->get();

        //add more comments when there is another comments
        if(!empty($check_reaction)){
            $data['comment'] = $request->comment;
            PostReaction::create($data);
        }

        //first time comments and like
        if($request->comment && $request->like){
            //reaction with like and comment
            $data['like'] = $request->like;
            $data['comment'] = $request->comment;
            PostReaction::create($data);

        }else if($request->comment){
            //reaction with comment
            $data['comment'] = $request->comment;
            PostReaction::create($data);

        }else if($request->like){
            //reaction with like
            $data['like'] = $request->like;
            PostReaction::create($data);
        }

        $reaction = PostReaction::where('user_id',$request->user_id)->get();
        $like = PostReaction::where('like','true')->get();
        $comment = PostReaction::with(['users'=>function ($q) use ($request){
                    $q->where('id',$request->user_id);
        }])->get();
        return response()->json([
            'status'=>true,
            'data'=>['check'=>$status,'reaction'=>$reaction,'like_count'=>count($like),'comment_count'=>count($comment),'comments'=>$comment]
        ]);
    }

    public function updateReaction(Request $request,$id){
        $check_reaction = PostReaction::where('id',$id)->first();
        $reaction = PostReaction::where('post_id',$check_reaction->post_id)->where('user_id',$check_reaction->user_id)->get();

        if($request->comment && $request->like){
            //condition with many reaction
            PostReaction::where('id',$id)->update([
                'comment'=>$request->comment
            ]);
            //update like all related comments
            if(!empty($reaction)){
                foreach($reaction as $reaction){
                    PostReaction::where('id',$reaction->id)->update([
                        'like'=>$request->like,
                    ]);
                }
            }else{
            //condition with only one reaction
            PostReaction::where('id',$id)->update([
                'like'=>$request->like,
                'comment'=>$request->comment
            ]);
            }
        }else if($request->comment){
            PostReaction::where('id',$id)->update([
                'comment'=>$request->comment
            ]);
        }else if($request->like){
           //condition with already like and many comments
            if(!empty($reaction)){
                foreach($reaction as $reaction){
                    PostReaction::where('id',$reaction->id)->update([
                        'like'=>$request->like
                    ]);
                }
            }else{
            //condition with only one reaction
            PostReaction::where('id',$id)->update([
                'like'=>$request->like
            ]);
            }
        }
        $comment = PostReaction::where('id',$id)->get();
        return response()->json([
            'status'=>true,
            'data'=>['comments'=>$comment]
        ]);
    }

    public function deleteReaction($id){
        PostReaction::where('id',$id)->delete();
        return response()->json([
            'status'=>true,
        ]);
    }

    //get request data
    private function getData($request){
        return([
            'post_id'=>$request->post_id,
            'user_id'=>$request->user_id,
        ]);
    }
}
