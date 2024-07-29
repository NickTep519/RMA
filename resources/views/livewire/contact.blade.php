<div>
    <form wire:submit="contact" class="mt-10">

        <div class="sm:col-span-4">
            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Tel :</label>
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" wire:model='phone' name="phone" id="phone" autocomplete="Numéro whatsapp" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Numéro whatsapp" autofocus>
            </div>
            <div>
                @error('form.title') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="mt-10 flex w-ful items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> Contacter </button>

    </form>
</div>
