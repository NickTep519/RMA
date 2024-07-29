<form method="post" action="{{ route('password.update') }}" class="account">
    @csrf
    @method('put')

    <div class="account-header">
        <h1 class="account-title">  
            {{ __('Mettre à jour le mot de passe') }}
        </h1>
            
    </div>
            
    <div class="account-edit">
        <div class="input-container">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
    </div>

    <div class="account-edit">
        <div class="input-container">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="input-container">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>
    </div>
       

    <div class="flex items-center gap-4">
        <x-primary-button class="btn-save">{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
