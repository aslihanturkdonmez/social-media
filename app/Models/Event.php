<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable=['title','online','description', 'event_photo_path', 'start_date','end_date','event_address','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Actions::class,'event_id');
    }


    public function likeCounterEvent(Event $event)
    {
        return $event->likes->where('event_id',$event->id)->
        where('action_type','like');
    }

    public function comments(Event $event)
    {
        $action=Actions::where([['event_id',$event->id],['action_type','comment']])->get();
        return $action;
    }

    public function event_user()
    {
        return $this->hasMany(Event_User::class,'event_id');
    }
}
