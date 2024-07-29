<form action="{{ route('profile.update') }}" method="POST" class="account">
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

</form>