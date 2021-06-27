<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\ProfileController;

class Friendship extends Component
{
    public function render()
    {
        
        return view('livewire.friendship',[
            'profile'=>$this->username,
            'user'=>$this->profile,
        ]);


    }


      public $username;
      public $profile;

      public function mount($profile)
      {
          $this->profile=$profile;
          $this->username = $profile->username;
      }


    public function add()
    {

        $user=User::where('username',$this->username)->first();
        Auth::user()->addFriend($user);

    }

    public function accept(){

            $user=User::where('username',$this->username)->first();
            Auth::user()->acceptFriendRequest($user);
        
    }

    public function delete(){

        $user=User::where('username',$this->username)->first();
        if(Auth::user()->isFriendWith($user) || (Auth::user()->hasFriendRequestPending($user)) || Auth::user()->hasFriendRequestReceived($user))
        {
            $friendshipID=Friend::where([['requester',Auth::user()->id],['user_requested',$user->id]])->
            orWhere([['requester',$user->id],['user_requested',Auth::user()->id]]);
            $friendshipID->delete();
        }
    }

}