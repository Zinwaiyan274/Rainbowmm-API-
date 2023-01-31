<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PostContent;
use App\Models\PostReaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_id','title','author_name','hero_image','view_count'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function postContents(){
        return $this->hasMany(PostContent::class);
    }

    public function postReactions(){
        return $this->hasMany(PostReaction::class);
    }


}
