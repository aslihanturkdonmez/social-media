<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<x-app-layout>
    <!-- Friends sayfası-->
    <x-slot name="slot">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mb-4 py-3 bg-transparent">
                    <!-- Arkadaşların Listesi-->
                    <div class="row d-flex justify-content-around">
                        <div class="border-1 col-md-5 rounded-xl shadow-sm sp-bg">
                            <div class="card-header sp-bg">
                                <h2 class="mt-4 text-xl leading-tight">Arkadaşların</h2>
                            </div>
                            <div class="">
                                <div class="card-body sp-bg">
                                    @if(!$friends->count())
                                    <p>Henüz hiç arkadaşın yok.</p>
                                    @else
                                        @if($friends->count()>9)
                                            <div class="overflow-auto" style="height: 430px;width:100%">
                                        @else 
                                            <div class="overflow-auto">
                                        @endif
                                            <ul class="list-group list-group-flush">
                                                @foreach($friends as $profile)
                                                    <li class="sp-bg list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <a href="{{route('profiles.show', $profile->username)}}">
                                                            <div class="flex flex-shrink-2">
                                                                <img src="{{ $profile->profile_photo_url }}" alt="{{ $profile->name }}" class="h-14 w-14 rounded-full object-cover img-thumbnail">
                                                                <span class="text-lg mt-3 ml-3">
                                                                    {{$profile->name}}
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--Arkadaşlık istekleri listesi -->
                        <div class="border-1 col-lg-6 rounded-xl shadow-sm sp-bg">
                            <div class="card-header sp-bg">
                                <h2 class="mt-4 font-semibold text-xl leading-tight">Arkadaşlık İstekleri</h2>
                            </div>
                            <div class="card-body sp-bg">
                                @if(!$requests->count())
                                <p class="pl-6">Henüz hiç arkadaşlık isteğin yok.</p>
                                @else
                                    @if($friends->count()>9)
                                        <div class="overflow-auto" style="height: 430px;width:100%">
                                    @else 
                                        <div class="overflow-auto">
                                    @endif
                                        <ul class="list-group list-group-flush"><br>
                                            @foreach($requests as $profile)
                                                <li class="sp-bg d-flex justify-content-start align-items-center flex-wrap">
                                                <a href="{{route('profiles.show', $profile->username)}}">
                                                            <div class="flex flex-shrink-2">
                                                                <img src="{{ $profile->profile_photo_url }}" alt="{{ $profile->name }}" class="h-14 w-14 rounded-full object-cover">
                                                                <span class="text-lg mt-3 ml-3 mr-2">
                                                                    {{$profile->name}}
                                                                </span>
                                                                
                                                            </div>
                                                        </a>
                                                        @livewire('friendship',['profile'=>$profile])
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>