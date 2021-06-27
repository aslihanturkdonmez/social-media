<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['content', 'post_photo_path', 'location','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Actions::class,'post_id');
    }

    public function likeCounterPost(Post $post)
    {
        return $post->likes->where('post_id',$post->id)
        ->where('action_type','like');
    }

    public function comments(Post $post)
    {
        return $post->likes->where('post_id',$post->id)->
        where('action_type','comment');
    }


    
}
