<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use Livewire\Livewire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $this->user=User::where('username', $username)->first();
        $posts=Post::where(function ($query){
            return $query->where('user_id',$this->user->id);
        })->orderBy('created_at','desc')->paginate(50);

        $events=Event::where(function ($query){
            return $query->where('user_id',$this->user->id);
        })->orderBy('created_at','desc')->paginate(50);

        $eventSort=Event::where(function ($query){
            return $query->where('user_id',$this->user->id);
        })->orderBy('start_date','asc')->paginate(20);

        $postAndEvents=$posts->merge($events)->sortByDesc('created_at');

        return view('\User\Profile\show', [
            'profile' => $this->user,
            'posts' =>$posts,
            'events'=>$events,
            'postAndEvents'=>$postAndEvents,
            'eventSort' =>$eventSort,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return Livewire::render('User/Profile/show',[
        //     'profile'=>$user,
        // ]);
        return view('\User\Profile\show', [
            'profile' => $user,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
