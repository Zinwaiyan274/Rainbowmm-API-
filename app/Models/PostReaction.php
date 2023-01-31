<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\PostReplyReaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostReaction extends Model
{
    use HasFactory;
    protected $fillable = ['id','post_id','user_id','comment','like'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function replyReactions(){
        return $this->hasMany(PostReplyReaction::class);
    }
}
