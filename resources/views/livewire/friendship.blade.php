<div>
    @if((Auth::user()->hasFriendRequestPending($user)))
        <p class="text-gray-300">Arkadaşlık isteği gönderildi</p>
        <button class="btn btn-success" wire:click="delete">
            İsteği iptal et
        </button>
    @elseif(Auth::user()->hasFriendRequestReceived($user))
        <div class="btn-toolbar justify-content-between">
            <div class="container">
                <button class="btn btn-outline-success hover:bg-green-600" wire:click="accept">
                    Kabul et
                </button>
                <button class="btn btn-outline-danger hover:bg-red-600" wire:click="delete">
                    Yoksay
                </button>
            </div>
        </div>
    @elseif(Auth::user()->isFriendWith($profile))
        <button class="btn btn-danger" wire:click="delete">
            Arkadaşı Sil
        </button>

    @elseif(!(Auth::user()->isFriendWith($user))&&!(Auth::user()->hasFriendRequestPending($user))&&!(Auth::user()->id==$user->id))
        <button class="btn btn-success" wire:click="add">
            Arkadaş Ekle
        </button>
    @endif
</div>