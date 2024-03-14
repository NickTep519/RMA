
@vite(['resources/css/register.css', 'resources/js/app.js'])

<x-guest-layout>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">

        <div class="logo">
            <img src="path/to/logo.png" alt="Logo Recherche de Maison ou d'appartement">
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre Numéro de Téléphone et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.') }}
        </div>

        <form method="POST" action="{{ route('password.phone') }}">
            @csrf

            <!--  Numéro de Téléphone -->
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" required>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="form-group">
                <button type="submit"> {{ __('Réinitialisation du mot de passe') }} </button>
            </div>
           
        </form>

    </div>
</x-guest-layout>
