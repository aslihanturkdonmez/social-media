<?php

namespace App\Models;

//use App\Traits\Friendable;
use App\Models\Post;
use App\Models\Event;
use App\Models\Actions;
use App\Models\Event_User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    //use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'grade',
        'branch',
        'gender',
        'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function post()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function myFriends() //Benim eklediğim kişiler
    { 
        return $this->belongsToMany(User::class, 'friends','requester','user_requested');
    }

    public function friendOf() //Beni ekleyen kisiler
    {
        return $this->belongsToMany(User::class, 'friends','user_requested','requester');
    }

    public function friends()
    {
        return $this->myFriends()->wherePivot('status',true)->get()->merge($this->friendOf()->wherePivot('status',true)->get());
    }

    public function friendRequests(){ //Bana gelen kabul edilmemis arkadaşlık istekleri
        return $this->friendOf()->wherePivot('status',false)->get();
    }

    public function friendRequestsPending() //Benim gönderdiğim (kabul edilmemiş) arkadaşlık istekleri
    { 
        return $this->myFriends()->wherePivot('status',false)->get();
    }

    public function hasFriendRequestPending(User $user) //Gönderdiğim ve bekleyen arkadaşlık isteği?
    {
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }

    public function hasFriendRequestReceived(User $user) //Aldığım arkadaşlık isteğim var mı?
    {
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }

    public function addFriend(User $user) //Arkadaş ekleme
    {
        return $this->myFriends()->attach($user->id);
    }

    public function acceptFriendRequest(User $user) //Arkadaşlık isteğini kabul et
    {
        $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
            'status' => true,
        ]);
    }

    public function isFriendWith(User $user)
    {
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    public function events()
    {
        return $this->hasMany(Event::class,'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Actions::class,'user_id');
    }

    public function hasLikedPost(Post $post)
    {
        return (bool) $post->likes->where('post_id',$post->id)->
        where('user_id',$this->id)->where('action_type','like')->count();
    }

    public function hasLikedEvent(Event $event)
    {
        return (bool) $event->likes->where('event_id',$event->id)->
        where('user_id',$this->id)->where('action_type','like')->count();
    }

    public function event_user()
    {
        return $this->hasMany(Event_User::class,'event_id');
    }

    public function hasJoinedEvent(Event $event)
    {
        return (bool) $event->event_user->where('event_id',$event->id)->
        where('user_id',$this->id)->count();
    }

    public function hasJoinedEventSort(Event $event)
    {
        return (bool) $event->event_user->
        where('user_id',Auth::user()->id)->count();
    }

    public function postAndEventCounter(User $user)
    {
        return $user->post->where('user_id',$user->id)->merge($user->events()->where('user_id',$user->id)->get());
    }
    
    public function postAndEventPhoto(User $user)
    {
        return $user->post->where('user_id',$user->id)->where('post_photo_path','!=', NULL)->merge($user->events()->where([['user_id',$user->id],['event_photo_path','!=',NULL]])->get());
    }
}