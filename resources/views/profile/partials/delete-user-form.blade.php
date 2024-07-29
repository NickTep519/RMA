<form method="post" action="{{ route('profile.destroy') }}" class="account">
    @csrf
    @method('delete')

    <div class="account-header">
        <h2 class="account-title">
            {{ __('Suppression de compte') }}
        </h2>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Supprimer votre compte') }}</x-danger-button>
               
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <br>
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Êtes-vous sûr de vouloir supprimer votre compte?') }}
        </h4>
        <br>
        <p class="mt-1 text-sm text-gray-600">
            Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.'
        </p>
        <br>
        <div class="account-edit">
            <div  class="input-container">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
    
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />
    
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>
        </div>
        

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Supprimer') }}
            </x-danger-button>
        </div>
    </x-modal>
</form>
