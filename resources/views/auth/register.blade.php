<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>BTUlendin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="antialiased">
        <div class="relative d-flex justify-content-around items-top min-h-screen sm:items-center sm:pt-0">
            <div class="hidden position-absolute text-center top-0 right-50 pb-6 py-4 sm:block">
                <img src="frontend/_images/logo.png" width="500" height="350">
                <h3>"Btü öğrencilerinin buluşma noktası."</h3>
            </div>

            <div class="justify-center mb-4 max-w-2xl mx-auto sm:px-6 lg:px-8" style="margin-top:185px;">
                <div class="formbody form-row overflow-hidden shadow-lg p-6 sm:rounded-lg">
                    <x-guest-layout>
                        <div class="mb-2 mt-2 px-10 text-mb">

                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <table>
                                    <tr>
                                        <td>
                                            <div>
                                                <x-jet-label for="name" value="{{ __('Ad Soyad') }}" />
                                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <x-jet-label for="username" value="{{ __('Kullanıcı Adı') }}" />
                                                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" required autocomplete="username" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="mt-4 w-75">
                                                <x-jet-label for="email" value="{{ __('E-posta') }}" />
                                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="password" value="{{ __('Şifre') }}" />
                                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="password_confirmation" value="{{ __('Şifre Tekrarı') }}" />
                                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="grade" value="{{ __('Sınıf') }}" />
                                                <!-- <x-jet-input id="grade" class="block mt-1 w-full" type="text" name="grade" required autocomplete="grade" /> -->
                                                <select name="grade" id="grade" class="block shadow-md border-0 rounded" required>
                                                    <option value="Hazırlık">Hazırlık</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="branch" value="{{ __('Bölüm') }}" />
                                                <!-- <x-jet-input id="branch" class="block mt-1 w-full" type="text" name="branch" required autocomplete="branch" /> -->
                                                <select name="branch" id="branch" class="block shadow-md border-0 rounded" required>
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
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="gender" value="{{ __('Cinsiyet') }}" />
                                                <!-- <x-jet-input id="gender" class="block mt-1 w-full" type="text" name="gender" required autocomplete="gender" /> -->
                                                <select name="gender" id="gender" class="block shadow-md border-0 rounded" required>
                                                    <option value="Erkek">Erkek</option>
                                                    <option value="Kadın">Kadın</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <x-jet-label for="birthday" value="{{ __('Doğum Tarihi') }}" />
                                                <x-jet-input id="birthday" class="birthday" type="date" name="birthday" required autocomplete="birthday" />
                                            </div>
                                        </td>
                                    </tr>

                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="mt-4">
                                            <x-jet-label for="terms">
                                                <div class="flex items-center">
                                                    <x-jet-checkbox name="terms" id="terms"/>

                                                    <div class="ml-2">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                'terms_of_service' => '<a target="blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'._('Terms of Service').'</a>',
                                                                'privacy_policy' => '<a target="blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'._('Privacy Policy').'</a>',
                                                        ]) !!}
                                                    </div>
                                                </div>
                                            </x-jet-label>
                                        </div>
                                    @endif
                                    <tr>
                                        <td colspan="2">
                                            <div class="flex items-center justify-center mt-8">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                    {{ __('Hesabınız var mı?') }}
                                                </a>

                                                <x-jet-button class="ml-4 bg-green-600 hover:bg-green-700">
                                                    {{ __('Kayıt Ol') }}
                                                </x-jet-button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </x-guest-layout>
                </div>
            </div>
        </div>
    </body>
</html>
