<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostContent extends Model
{
    use HasFactory;
    protected $fillable = ['id','post_id','content','image'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }

}

