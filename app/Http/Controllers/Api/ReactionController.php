<?php

namespace App\Http\Controllers\Api;

use App\Models\PostReaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReactionController extends Controller
{
    public function saveReaction(Request $request){
        $data = $this->getData($request);
        $check = PostReaction::where('user_id',$request->user_id)->where('post_id',$request->post_id)->first();

        if($request->comment && $request->like){
            $data['like'] = $request->like;
            $data['comment'] = $request->comment;
           // check already like and comment
           if(!$check){
                PostReaction::create($data);
           }else{
                PostReaction::where('id',$check->id)->update([
                        'comment'=>$request->comment,
                        'like'=>$request->like
                ]);
           }
        }else if($request->comment){
            $data['comment'] = $request->comment;
           // check already like and comment
           if(!$check){
                PostReaction::create($data);
           }else{
                PostReaction::where('id',$check->id)->update([
                        'comment'=>$request->comment,
                ]);
           }
        }else if($request->like){
            $data['like'] = $request->like;
           // check already like and comment
           if(!$check){
                PostReaction::create($data);
           }else{
                PostReaction::where('id',$check->id)->update([
                        'like'=>$request->like,
                ]);
           }
        }

        $reaction = PostReaction::where('user_id',$request->user_id)->get();
        $like = PostReaction::where('like','true')->get();
        $comment = PostReaction::get();
        return response()->json([
            'status'=>true,
            'data'=>['User Reaction'=>$reaction,'Like Count'=>count($like),'Comment Count'=>count($comment),'Comments'=>$comment]
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


