<div class="relative col md-4">
    <input id="myInput" class="rounded-pill border-gray-300" type="text" wire:model="search" placeholder="Kullanıcı ara" 
    wire:keydown.escape="close"/>
    <br>
    <div class="text-gray-500 text-sm" wire:loading>&emsp;Kullanıcılar aranıyor...</div>
    <div wire:loading.remove>
        @if ($search == "")
        @else
            @if($users->isEmpty()|| $search == " ")
            <div class="text-gray-500 text-sm mt-1">
                &emsp;&emsp;Sonuç bulunamadı!
            </div>
            @else
                @if($users->count()>7)
                <div class="absolute bg-gray-100 text-sm rounded-lg w-64 mt-8 overflow-auto" style="height: 302px;width:350px">
                @else 
                <div class="absolute bg-gray-100 text-sm rounded-lg w-64 mt-8 overflow-auto" style="width:350px">
                @endif
                    <ul>
                        @foreach($users as $user)
                        <li class="border py-1 border-green" > 
                            <a href="{{route('profiles.show', $user->username)}}">
                                <div class="flex mx-auto pl-4">
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                        class="h-10 w-10 rounded-full img-thumbnail object-cover">
                                    <span class="text-lg font-semibold ml-4 mt-2">
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    </span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    </div>
</div>
