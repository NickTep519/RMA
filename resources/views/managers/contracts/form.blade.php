<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/contracts.css'])

    <title>{{$contract->exists ? 'RMA-Modifier un Contract' :  'RMA-Emettre un Contract'}}</title>
    
</head>
<body>

    <div class="container" >

        <header>{{$contract->exists ? 'Modifier un Contrat' : 'Emettre un Contrat'}}</header>

        <form action="{{$contract->exists ? route('managers.contract.update', $contract) : route('managers.contract.store')}}" method="POST">
            @csrf
            @if ($contract->exists)
                @method('PUT')
            @endif

            <div class="form first" >
                <div class="details paersonal" >
                    <span class="title" ></span>

                    <div class="fields" >
                         
                        <div class="input-fields">
                            <label for="tenant_name">Nom Complet du Locataire : </label>
                            <input type="text" name="tenant_name" id="tenant_name" placeholder="Nom Complet" value="{{old('tenant_name', $contract->tenant_name)}}" required autofocus>
                            @error('tenant_name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="input-fields">
                            <label for="tenant_phone">Tel : </label>
                            <input type="tel" name="tenant_phone" id="tenant_phone" placeholder="Numero" value="{{old('tenant_phone', $contract->tenant_phone)}}" required>
                            @error('tenant_phone')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="input-fields">
                            <label for="npi"> NPI : </label>
                            <input type="number" name="npi" id="npi" placeholder="Numero d'Identification Personelle" value="{{old('npi', $contract->npi)}}" required>
                            @error('npi')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="input-fields">
                            <label for="profession">Profession : </label>
                            <input type="text" name="profession" id="profession" placeholder="Profession" value="{{old('profession', $contract->professon)}}" required>
                            @error('profession')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>    
                            @enderror
                        </div>

                        <div class="input-fields">
                            <label for="rent">Loyer : </label>
                            <input type="number" name="rent" id="rent" placeholder="Loyer" value="{{old('rent', $contract->rent)}}" required>
                            @error('rent')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="input-fields">
                            <label for="integration_date"> Date d'integration : </label>
                            <input type="datetime-local" name="integration_date" id="integration_date" value="{{old('integration_date', $contract->integration_date)}}" required>
                            @error('integration_date')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <button class="nextBtn" >
                    @if ($contract->exists)
                        <span>Modifier le contrat de {{$contract->tenant_name}}</span>
                    @else
                        <span>Emettre un nouveau contrat</span>
                    @endif
            </button>
        </form>

    </div>
    
</body>
</html>