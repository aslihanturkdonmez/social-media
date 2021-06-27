<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3 gedf-main">
            <span class="text-success" id="spanB">YAKLAŞAN ETKİNLİKLER</span>
            @foreach($eventSort as $eventS)
            @if(Auth::user()->hasJoinedEventSort($eventS))
            @if( (\Carbon\Carbon::today()->lte($eventS->start_date).' 00:00:00') && \Carbon\Carbon::parse($eventS->start_date)->diffInDays(\Carbon\Carbon::now())<7)
            <div class="card px-4 pt-4 pb-4 mx-auto mt-3 divB b" id="div">
                <button
                    class="btn btn-outline-danger alertt">@if(\Carbon\Carbon::parse($eventS->start_date)->format('d/m/Y')==\Carbon\Carbon::now()->format('d/m/Y'))
                    {{\Carbon\Carbon::parse($eventS->start_date)->diffInDays(\Carbon\Carbon::now())}}
                    @else
                    {{\Carbon\Carbon::parse($eventS->start_date)->diffInDays(\Carbon\Carbon::now())+1}}
                    @endif GÜN KALDI</button>

                <div class="row a ">
                        @if($eventS->event_photo_path)
                        <img src="{{ asset('storage/' . $eventS->event_photo_path) }}" alt="" class="object-cover foto pt-4"
                            id="foto">
                        @endif
                        <div class="flex items-center divB mt-2">
                            <h5 class="align-self-center font-semibold" id="baslikBes">{{$eventS->title}} </h5>
                        </div>
                    </div>
                    <p class="mt-1 mb-2 parag" id="parag">
                        {{ \Carbon\Carbon::parse($eventS->start_date)->format('d/m/Y')}} /
                        {{ \Carbon\Carbon::parse($eventS->end_date)->format('d/m/Y')}}
                        @if($eventS->online) -- Online @endif</p>

                    <h5 class="mt-2 overflow-auto" style="height:40px">{{$eventS->description}}</h5>
                    <p class="mt-2 mb-2 parag" id="parag">Düzenleyen</p>
                    <div class="usersFoto">
                        <a href="{{route('profiles.show', $eventS->user->username)}}">
                            <img class="h-12 w-12 rounded-circle object-cover"
                                src="{{$eventS->user->profile_photo_url}}" alt="{{$eventS->user->username}}">
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>

        <div class="col-md-6 gedf-main">
            <!--- \\\\\\\Post Oluştur-->
            <div class="shadow-md rounded-xl sp-bg">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <form wire:submit.prevent="addPost">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="content" rows="2" placeholder="Ne düşünüyorsun?"
                                        wire:model="contentPost"></textarea>
                                </div><br>
                        </div>
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="form-group">
                                <div class="custom-file">
                                   <!--  <input wire:model="photo" type="file" class="custom-file-input" name="photo"> -->
                                </div>
                            </div>
                            <div class="py-4"></div>
                        </div>
                    </div>

                    <div class="btn-toolbar justify-content-between">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div>
                                        @if($this->contentPost || $this->photo!=Null)

                                        <x-jet-button type="submit" class="bg-green-600 hover:bg-green-700">
                                        <p class="mt-2 mb-2">Gönder</p>
                                        </x-jet-button>
                                        @else
                                        <x-jet-button type="submit" class="bg-green-600 hover:bg-green-700" disabled>  
                                            <p class="mt-2 mb-2">Gönder</p>
                                        </x-jet-button>
                                        @endif
                                    </div>
                                    </form>
                                </div>

                                <div class="col-sm">
                                    <div class="mb-3">
                                        <label class="btn" for="my-file-selector" style="background-color:#059669; color:white; font-size:13.33px">
                                            <input id="my-file-selector" type="file" wire:model="photo"
                                                style="display:none;"
                                                onchange="$('#upload-file-info').text(this.files[0].name)">
                                            <p class="mt-2 mb-2 mr-2 ml-1">DOSYA SEÇ </p>  
                                        </label>
                                        <span class='label label-info' id="upload-file-info"></span>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="tab-pane fade show active" id="locations" role="tabpanel"
                                        aria-labelledby="posts-tab">
                                        <!--Mekan Ekleme Butonu -->
                                        <x-jet-button wire:click="addLocation" class="bg-green-600 hover:bg-green-700">
                                            Mekan Paylaş
                                        </x-jet-button>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="tab-pane fade show active" id="events" role="tabpanel"
                                        aria-labelledby="posts-tab">
                                        <!--Etkinlik Butonu -->
                                        <x-jet-button wire:click="addEvent" class="bg-green-600 hover:bg-green-700">
                                            Etkinlik Oluştur
                                        </x-jet-button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    @if($photo)
                                    <br>
                                    Resim Önizlemesi:
                                    <img src="{{ $photo->temporaryUrl() }}" class="rounded-xl img-fluid mx-auto">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- POSTLARI GÖRÜNTÜLE-->
            @if(!$posts->count() && !$events->count())
            <div class="col md-9 mt-12">
                <div class="text-black text-center" style="max-width: 80rem; height:7rem; background-color:#F9FFF9; border-radius: 0.75rem;">
                <div class="card-header"><i class="fa fa-files-o" aria-hidden="true"></i> BİLGİLENDİRME</div>
                <div class="card-body">
                    <h5 class="card-title"> Henüz Anasayfada Görüntülenecek Bir Şey Yok.</h5>
                </div>
                </div>
            </div>
            @else
                @foreach($postAndEvents as $post)
                <div class="mb-12"></div>
                <div class="shadow-md rounded-xl sp-bg">
                    <div class="px-4 pt-4 sp-bg rounded-xl">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-self-center">
                                <a href="{{route('profiles.show', $post->user->username)}}">
                                    <button
                                        class="mr-2 flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-12 w-12 rounded-circle object-cover"
                                            src="{{$post->user->profile_photo_url}}" alt="{{$post->user->username}}">&nbsp;
                                        <label class="pt-1">
                                            <p class="align-self-center text-lg">{{$post->user->name}}</p>
                                            <p class="text-muted text-xs text-left mb-2"> <i class="fa fa-clock-o"></i>
                                                @if(\Carbon\Carbon::parse($post->created_at)->diffInMinutes()<59)
                                                    {{\Carbon\Carbon::parse($post->created_at)->diffInMinutes()}} dk önce
                                                                    
                                                @elseif(\Carbon\Carbon::parse($post->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($post->created_at)->diffInHours()<24)
                                                    {{\Carbon\Carbon::parse($post->created_at)->diffInHours()}} saat önce
                                                                
                                                @elseif(\Carbon\Carbon::parse($post->created_at)->diffInHours()>24)
                                                    {{\Carbon\Carbon::parse($post->created_at)->diffInDays()}} gün önce

                                                @else {{$post->created_at}}
                                                @endif
                                            </p>
                                        </label>
                                    </button>
                                </a>
                            </div>
                            <!-- POST SİLME BUTONU -->
                            @if($post->user->id==Auth::user()->id)
                            <button class="btn btn-outline-success"
                                wire:click="deletePost({{$post->id}},'{{isset($post->title)}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div><hr>

                    <div class="card-body">
                        <!-- Mekan paylaşımı olan gönderi -->
                        @if(!$post->title)
                        @if($post->location)
                        <p class="pl-6">{{$post->user->name}} <a href="https://www.google.com/maps/place/{{$post->location}}" target="_blank" style="color:blue;">{{$post->location}}</a> mekanındaydı.
                        </p>
                            @if($post->content)
                                <br><label class="pl-6" for=""><b>"{{$post->content}}"</b></label><br>
                            @endif
                        

                        @elseif($post->content)
                        <br><label class="pl-6" for="">{{$post->content}}</label><br>
                        @endif

                        @if($post->post_photo_path)
                        <img class="rounded-xl img-fluid mx-auto shadow-sm" src="{{ asset('storage/' . $post->post_photo_path) }}" alt=""><br>

                        @endif
                        <br><hr>
                    </div>
                    @else
                    <!-- Eğer post etkinlik ise-->

                    <label class="pl-4" for="">
                    <i class="far fa-calendar-alt"></i>
                        </label> 
                        <!--Etkinlik online ise-->
                    @if($post->online=="1")
                        <label class="pl-4 pr-2 font-semibold" for="">{{$post->title}}</label>
                        <label class="text-red-500" for="">(Online Etkinlik)</label>
                        <br><br>
                    @else
                        <label class="pl-4" for="">{{$post->title}}</label><br><br>
                    @endif

                    <label class="pl-4" for=""><i class="far fa-clock"></i></label> 
                    <label class="pl-4 pr-2 font-semibold" for="">Başlangıç Tarihi: </label> {{$post->start_date}}
                    <br><br>

                    <label class="pl-4" for=""><i class="fas fa-history"></i></label> 
                    <label class="pl-4 pr-2 font-semibold" for="">Bitiş Tarihi:</label> {{$post->end_date}}
                    <br><br>

                    <label class="pl-4" for=""><i class="fas fa-map-marker-alt"></i></label> 
                    <label class="pl-4 pr-2 font-semibold" for="">Etkinlik Adresi:</label> {{$post->event_address}}
                    <br><br>

                    <label class="pl-4" for=""> {{$post->description}}</label>
                    <br>

                    @if($post->event_photo_path)
                        <img class="rounded-xl img-fluid mx-auto shadow-sm" src="{{ asset('storage/' . $post->event_photo_path) }}" alt="">

                    @endif
                    <br><hr>
                </div>
                @endif
                <div class="p-2 px-4">
                    <!-- LIKE SAYISI -->
                    @if(!$post->title)
                    <span>
                        <p class="btn btn-danger">
                            {{$post->likeCounterPost($post)->count()}}
                        </p>
                    </span>
                    @else
                    <span>
                        <p class="btn btn-danger">
                            {{$post->likeCounterEvent($post)->count()}}
                        </p>
                    </span>
                    @endif
                    @if((!$post->title && !Auth::user()->hasLikedPost($post)) || ($post->title &&
                    !Auth::user()->hasLikedEvent($post)))
                    <!-- BEĞENİ BUTONU -->
                    <button wire:click="getLikes({{$post->id}},'{{isset($post->title)}}')" class="btn btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                    </button>
                    <!-- BEĞENİYİ GERİ ALMA -->
                    @else
                    <button wire:click="getUnlike({{$post->id}},'{{isset($post->title)}}')" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                        </svg>
                    </button>
                    @endif
                    <!-- KATILIMCI OLMA BUTONU -->
                    @if($post->title)
                    @if(!Auth::user()->hasJoinedEvent($post))
                    <button class="btn btn-outline-danger" wire:click="join({{$post->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd"
                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                    <!--  KATILIMI İPTAL ETME -->
                    @else
                    <button class="btn btn-success" wire:click="cancelJoin({{$post->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-check" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd"
                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                    @endif
                    @endif
                    <!-- KATILIM BUTONU SONU -->
                    <!-- yorum yapma -->
                    <span class="commenter-name">
                        <input type="text" class="form-inline rounded-pill border-gray-300" placeholder="Bir yorum yaz"
                            name="{{$post->id}}" wire:model="content.{{$post->id}}">
                        <x-jet-button wire:click="getComment({{$post->id}},'{{isset($post->title)}}')"
                            class="bg-green-600 hover:bg-green-700">
                            Gönder
                        </x-jet-button>
                    </span><br>
                    <span>
                        <!-- YORUMLARI GÖSTER -->
                        @if($post->comments($post))
                        <ul class="list-group list-group-flush">
                            @foreach($post->comments($post) as $action)
                                <li class="list-group-item justify-content-between align-items-center flex-wrap bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <a href="{{route('profiles.show', $action->user->username)}}">
                                            <div class="flex items-center px-2 py-2">
                                                <div class="flex flex-shrink-2">
                                                    <img src="{{$action->user->profile_photo_url}}" alt="{{$action->user->username}}" class="h-10 w-10 rounded-full object-cover">&nbsp;
                                                    <label class="align-self-center">
                                                        <p class="h6">{{$action->user->name}}</p>
                                                        <p class="text-muted text-xs mb-2"> <i class="fa fa-clock-o"></i>
                                                            @if(\Carbon\Carbon::parse($action->created_at)->diffInMinutes()<59)
                                                                {{\Carbon\Carbon::parse($action->created_at)->diffInMinutes()}} dk önce
                                                                                
                                                            @elseif(\Carbon\Carbon::parse($action->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($action->created_at)->diffInHours()<24)
                                                                {{\Carbon\Carbon::parse($action->created_at)->diffInHours()}} saat önce
                                                                            
                                                            @elseif(\Carbon\Carbon::parse($action->created_at)->diffInHours()>24)
                                                                {{\Carbon\Carbon::parse($action->created_at)->diffInDays()}} gün önce

                                                            @else {{$action->created_at}}
                                                            @endif
                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        </a>&emsp;
                                        <div class="ms-auto">
                                            @if($action->user->id==Auth::user()->id)
                                                <button class="btn btn-outline-success"
                                                    wire:click="deleteComment({{$action->id}},'{{isset($post->title)}}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                        
                                    <div class="w-100 flex flex-grow">
                                        <span class="card border-none ml-3 py-1 px-4 sp-cm rounded-pill overflow-auto">
                                            {{$action->content}}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul><br>
                        @endif
                    </span>
                </div>
            </div>
            @endforeach
        @endif

        <!-- MODALLAR -->

        <!--ETKİNLİK MODALI-->
        <x-jet-dialog-modal wire:model="addEventConfirm">
            <x-slot name="title">
                {{ 'Etkinlik Oluştur'}}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Etkinlik Adı') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="title" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <x-jet-label for="price" value="{{ __('Açıklama') }}" />
                    <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="description" />
                    <x-jet-input-error for="description" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <x-jet-label for="start_date" value="{{ __('Başlangıç Tarihi') }}" />
                    <x-jet-input id="start_date" class="start_date" type="date" name="start_date" required
                        autocomplete="start_date" wire:model.defer="start_date" />
                    @error('start_date')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <x-jet-label for="end_date" value="{{ __('Bitiş Tarihi') }}" />
                    <x-jet-input id="end_date" class="end_date" type="date" name="end_date" required
                        autocomplete="end_date" wire:model.defer="end_date" />
                    @error('end_date')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <x-jet-label for="price" value="{{ __('Etkinlik Adresi') }}" />
                    <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="event_address" />
                    <x-jet-input-error for="event_address" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <input type="file" wire:model="photoEvent" require=false>
                </div>
                @if ($photoEvent)
                Resim Görünümü:
                <img src="{{ $photoEvent->temporaryUrl() }}">
                @endif

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model.defer="online" class="form-checkbox" value="1" />
                        <span class="ml-2 text-sm text-gray-600">Online Event</span>
                    </label>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('addEventConfirm', false)" wire:loading.attr="disabled">
                    {{ __('Vazgeç') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2 bg-green-600" wire:click="saveEvent" wire:loading.attr="disabled">
                    {{ __('Ekle') }}
                    </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <!--LOCATION MODALI-->
        <x-jet-dialog-modal wire:model="addLocationConfirm">
            <x-slot name="title">
                {{ 'Mekan Paylaş'}}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Mekan Adı') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="location" required />
                    <x-jet-input-error for="location" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <x-jet-label for="price" value="{{ __('Mekan Hakkında Düşüncelerin') }}" />
                    <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="content" />
                    <!-- <x-jet-input-error for="content" class="mt-2" /> -->
                </div>

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <input type="file" wire:model="photo" require=false>
                </div>
                @if ($photo)
                Resim Görünümü:
                <img src="{{ $photo->temporaryUrl() }}">
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('addLocationConfirm', false)" wire:loading.attr="disabled">
                    {{ __('Vazgeç') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2 bg-green-600" wire:click="saveLocation" wire:loading.attr="disabled">
                    {{ __('Ekle') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>
</div>
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

