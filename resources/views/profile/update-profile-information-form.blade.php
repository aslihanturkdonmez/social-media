<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profil Bilgisi') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Profil bilgilerinizi güncelleyebilirsiniz.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Yeni fotoğraf yükle') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-danger-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Fotoğrafı Kaldır') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Ad Soyad') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Userame -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Kullanıcı Adı') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username"/>
            <x-jet-input-error for="username" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"/>
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Grade -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="grade" value="{{ __('Sınıf') }}" />
            <select name="grade" id="grade" class="block shadow-md border-0 rounded" wire:model.defer="state.grade">
                <option value="Hazırlık">Hazırlık</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <x-jet-input-error for="grade" class="mt-2" />
        </div>

        <!-- Branch -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="branch" value="{{ __('Bölüm') }}" />
            <select name="branch" id="branch" class="block shadow-md border-0 rounded" wire:model.defer="state.branch">
                <option value="Bilgisayar Mühendisliği">Bilgisayar Mühendisliği</option>
                <option value="Biyomühendislik">Biyomühendislik </option>
                <option value="Çevre Mühendisliği">Çevre Mühendisliği </option>
                <option value="Elektrik-Elektronik Mühendisliği">Elektrik-Elektronik Mühendisliği </option>
                <option value="Endüstri Mühendisliği">Endüstri Mühendisliği </option>
                <option value="Gıda Mühendisliği">Gıda Mühendisliği </option>
                <option value="İnşaat Mühendisliği">İnşaat Mühendisliği </option>
                <option value="İşletme">İşletme </option>
                <option value="Kimya">Kimya </option>
                <option value="Kimya Mühendisliği">Kimya Mühendisliği </option>
                <option value="Makine Mühendisliği">Makine Mühendisliği </option>
                <option value="Matematik">Matematik </option>
                <option value="Mekatronik Mühendisliği">Mekatronik Mühendisliği </option>
                <option value="Metalurji ve Malzeme Mühendisliği">Metalurji ve Malzeme Mühendisliği </option>
                <option value="Mimarlık Bölümü">Mimarlık Bölümü </option>
                <option value="Orman Mühend​isliği">Orman Mühend​isliği </option>
                <option value="Orman Endüstrisi Mühendisliği">Orman Endüstrisi Mühendisliği </option>
                <option value="Peyzaj Mimarlığı">Peyzaj Mimarlığı </option>
                <option value="Polimer Malzeme Mühendisliği">Polimer Malzeme Mühendisliği </option>
                <option value="Psikoloji">Psikoloji </option>
                <option value="Sosyoloji">Sosyoloji </option> 
                <option value="Şehir Bölge Planlama Bölümü">Şehir Bölge Planlama Bölümü </option>
                <option value="Uluslararası İlişkiler">Uluslararası İlişkiler </option>
                <option value="Uluslararası Ticaret ve Lojistik">Uluslararası Ticaret ve Lojistik </option>
            </select>
            <x-jet-input-error for="branch" class="mt-2" />
        </div>
        

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Değişiklikler kaydedildi.') }}
        </x-jet-action-message>

        <x-jet-button class="bg-green-600 hover:bg-green-700" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Kaydet') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
