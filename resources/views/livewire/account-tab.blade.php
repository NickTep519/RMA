@vite(['resources/css/app.css'])
<form action="{{ route('profile.update') }}" method="POST" class="account" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <div class="account-header">
        <h1 class="account-title"> Accout Setting</h1>
        <div class="btn-container">
            <!--<button class="btn-cancel">Cancel</button>-->
            <button class="btn-save">Save</button>
        </div>
    </div>
        
    <div class="account-edit">

        <div class="input-container">
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name" value="{{old('name', $user->name)}}" autofocus >
            @error('name')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="input-container">
            <label for="city">Ville : </label>
            <input type="text" name="city" id="city" value="{{old('city', $user->city)}}">
            @error('city')
                <div>
                    {{$message}}
                </div>
            @enderror
        </div>

    </div>

    <div class="account-edit">

        <div class="input-container">
            <label for="">Email :</label>
            <input type="email" name="email" id="email" value="{{old('email', $user->email)}}">
            @error('email')
                <div>
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-container">
            <label for="phone">Tel : </label>
            <input type="Tel" name="phone" id="phone" value="{{old('phone', $user->phone)}}" >
            @error('phone')
                <div>
                    {{$message}}
                </div>
            @enderror
        </div>

    </div>

    <div class="account-edit">
        <div class="input-container">
            <label for="biography"> Description : </label>
            <textarea name="biography" id="biography" placeholder="Dites ici en quelques mots(une phrase au plus ) pourquoi un clien doit vous faire confiance pour la location d'un bien...?">{{old('biography', $user->biography)}}</textarea>
            @error('biography')
                <div>
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>

    <div class="space-y-12">
        <div class="col-span-full">
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo de profile</label>
            <div class="mt-2 flex items-center gap-x-3">
                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <img src="{{app(App\Service\ImagePathGenerator::class)->generate($user->profile_image, ['h'=>200, 'w'=>200])}}" alt="{{$user->name}}" class="profile-img">
                </svg>
                <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                          <span>Changer</span>
                          <input id="file-upload" name="profile_image" type="file" class="sr-only">
                        </label>
                    </div>
                </button>
               
            </div>
        </div>
    </div>

</form>