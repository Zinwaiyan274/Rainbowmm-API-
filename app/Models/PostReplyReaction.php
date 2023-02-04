<?php

namespace App\Models;

use App\Models\PostReaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostReplyReaction extends Model
{
    use HasFactory;
    protected $fillable = ['id','post_reaction_id','reply_like','reply_comment','reply_user_id'];

    public function postReactions(){
        return $this->belongsTo(PostReaction::class);
    }
}
