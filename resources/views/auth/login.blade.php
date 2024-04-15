
@vite(['resources/css/register.css', 'resources/js/app.js'])

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container">

        <div class="logo">
            <img src="path/to/logo.png" alt="Logo Recherche de Maison ou d'appartement">
        </div>

        <h2>Connexion</h2>
        <form action="{{route('login.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" required>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-group">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">{{__('Se souvenir de moi')}}</label>
            </div>
                    
            <div class="form-group">
                <button type="submit">Se connecter</button>
            </div>

            @if (Route::has('password.request'))
                <div class="options">
                    <p><a href="{{ route('password.request') }}"> {{ __('Mot de pass oublié ?') }}</a></p>
                </div>
            @endif
     
        </form>
        
        <div class="options">
            <p>Pas encore inscrit ? <a href="{{route('register')}}">Inscrivez-vous</a></p>
        </div>
    </div>
    

   <!--<form method="POST" action="{{ route('login') }}">
        @csrf

        Email Address 
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

     Password 
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        Remember Me 
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>-->
</x-guest-layout>
