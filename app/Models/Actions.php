<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    use HasFactory;
    protected $fillable=['content', 'user_id', 'post_id','action_type','event_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }
}
