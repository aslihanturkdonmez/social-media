<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Actions;
use App\Models\Event_User;
use Illuminate\Notifications\Action;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $event;



    public function render()
    {
        $posts=Post::where(function ($query){
            return $query->where('user_id',Auth::user()->id)
            ->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
        })->orderBy('created_at','desc')->paginate(50);

        $events=Event::where(function ($query){
            return $query->where('user_id',Auth::user()->id)
            ->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
        })->orderBy('created_at','desc')->paginate(50);

        $eventSort=Event::where(function ($query){
            return $query->where('user_id',Auth::user()->id)
            ->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
        })->orderBy('start_date','asc')->paginate(50);

        $postAndEvents=$posts->merge($events)->sortByDesc('created_at');


        

        return view('livewire.posts',[
            'posts'=>$posts,
            'events'=>$events,
            'postAndEvents'=>$postAndEvents,
            'eventSort'=>$eventSort,
        ]);
    }

    public $post;
    public $content;
    public $user_id;
    public $photo;
    public $addEventConfirm=false;
    public $addLocationConfirm=false;
    public $title;
    public $description;
    public $event_address;
    public $start_date;
    public $end_date;
    public $photoEvent;
    public $filenameEvent;
    public $online;
    public $location;

    protected $rules = [
        'photoEvent' => 'max:1024',
        'title' => 'required | min:2',
        'description'=>'required',
        'start_date'=>'required|date|after:today',
        'end_date'=>'required|date|after_or_equal:start_date',
        'event_address'=>'required',
    ];


    public function addEvent(){
        $this->reset(['title','description','start_date','end_date','event_address','online']);
        $this->photoEvent=null;
        $this->addEventConfirm=true;
    }

    public function saveEvent()
    {
        $this->validate();
        $this->photoEvent ? $filenameEvent=$this->photoEvent->store('photos') : $filenameEvent=Null;
        $this->online ? $this->online : $this->online=0;
        Event::create([
            'user_id'=>Auth::user()->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'event_address'=>$this->event_address,
            'event_photo_path'=>$filenameEvent,
            'online' =>$this->online,
        ]);
        $this->addEventConfirm=false;
    }

    public function addLocation()
    {
        $this->addLocationConfirm=true;
    }

    public function saveLocation(){
        $this->photo ? $filename=$this->photo->store('photos') : $filename=Null;
        if($this->location){
            Post::create([
                'user_id'=>Auth::user()->id,
                'content'=>$this->content,
                'location'=>$this->location,
                'post_photo_path'=>$filename,
            ]);
        }

        $this->reset('content');
        $this->reset('location');
        $this->photo=null;
        $this->addLocationConfirm=false;
    }

        public function addPost(){
            $this->photo ? $filename=$this->photo->store('photos') : $filename=Null;
            if(!$this->contentPost && !$filename){
                return "Boş gönderi gönderilemez";
                
            }else {
            Post::create([
                'user_id'=>Auth::user()->id,
                'content'=>$this->contentPost,
                'post_photo_path'=>$filename,
            ]); 

            $this->reset('contentPost');
            $this->photo=null;
        
    }
    }

    public $postId;
    public $postTitle;
    public $contentPost;


    public function getLikes($postId,$cvp)
    {
        if($cvp==1){
            $postID=Event::find($this->postId);
            Actions::create([
                'user_id'=>Auth::user()->id,
                'action_type'=>'like',
                'event_id'=>$postId,
                
                
            ]);
        }else{
            $postID=Post::find($this->postId);
            Actions::create([
                'user_id'=>Auth::user()->id,
                'action_type'=>'like',
                'post_id'=>$postId,
                
            ]);
        }
    }
    public $post_id;
    public function getUnlike($post_id,$cvp){

        if($cvp=='1'){
            $postID=Actions::where([['user_id',Auth::user()->id],['event_id',$post_id],['action_type','like']]);
            $postID->delete();
        }else{
            $postID=Actions::where([['user_id',Auth::user()->id],['post_id',$post_id],['action_type','like']]);
            $postID->delete();
        }

    }

    public function getComment($postId,$cvp){
        if($cvp=='1'){
            $postID=Event::find($this->postId);
            Actions::create([
                'user_id'=>Auth::user()->id,
                'action_type'=>'comment',
                'event_id'=>$postId,
                'content'=>$this->content[$postId],
                
                
            ]);
        }else{
            $postID=Post::find($this->postId);
            Actions::create([
                'user_id'=>Auth::user()->id,
                'action_type'=>'comment',
                'post_id'=>$postId,
                'content'=>$this->content[$postId],
                
            ]);
        }
        $this->reset('content');
    }

    public function join($postId){
        Event_User::create([
            'user_id'=>Auth::user()->id,
            'event_id'=>$postId,
        ]);
    }

    public function cancelJoin($postId){
        $postID=Event_User::where([['user_id',Auth::user()->id],['event_id',$postId]]);
        $postID->delete();
    }

    public function deletePost($postId,$cvp){
        if($cvp=='1'){
            $postID=Event::where([['user_id',Auth::user()->id],['id',$postId]]);
            $postID->delete();
            $eventUserDelete=Event_User::where([['event_id',$postId]]);
            $eventUserDelete->delete();
            $actionDelete=Actions::where([['event_id',$postId]]);
            $actionDelete->delete();


        }else{
            $postID=Post::where([['user_id',Auth::user()->id],['id',$postId]]);
            $postID->delete();
            $actionDelete=Actions::where([['post_id',$postId]]);
            $actionDelete->delete();
        }

    }

    public function deleteComment($actionId){
            $actionID=Actions::where('id',$actionId);
            $actionID->delete();

    }

}
