@vite(['resources/css/register.css', 'resources/js/app.js'])

<x-guest-layout>
    <div class="container">

        <!-- Logo de l'application -->
        <div class="logo">
            <img src="path/to/logo.png" alt="Logo  recherche de maison ou d'appartement">
        </div>

        <h2>Inscription</h2>
        <form action="{{route('register.store')}}" method="post">
            @csrf
            <!-- Nom -->
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" placeholder="Nom Bailleurs/Démarcheur/Agence immobilière" required  autofocus autocomplete="name" value="{{old('name', )}}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!--Numero de tel -->
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" required autocomplete="phone" value="{{old('phone')}}">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Mot de Pass-->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!--Confirmation de mot de Pass-->
            <div class="form-group">
                <label for="confirm-password">Confirmation du mot de passe</label>
                <input type="password" id="confirm-password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="form-group">
                <button type="submit">S'inscrire</button>                
            </div>
        </form>
            <p>Déjà inscrit ? <a href="{{route('login')}}">Connectez-vous</a></p>
    </div>
    
</x-guest-layout>
