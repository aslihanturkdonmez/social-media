<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_User extends Model
{
    use HasFactory;
    protected $table = 'event__users';

    protected $fillable=['user_id', 'event_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

}
