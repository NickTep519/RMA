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

        <form action="{{$contract->exists ? route('managers.contract.edit', $contract) : route('managers.contract.create')}}" method="POST">
            @csrf
            @method($contract->exists ? 'PUT' : 'POST')

            <div class="form first" >
                <div class="details paersonal" >
                    <span class="title" ></span>

                    <div class="fields" >
                         
                        <div class="input-fields">
                            <label for="">Nom Complet du Locataire : </label>
                            <input type="text" placeholder="Nom Complet" required autofocus>
                        </div>

                        <div class="input-fields">
                            <label for="">Tel : </label>
                            <input type="tel" placeholder="Numero" required>
                        </div>
                        
                        <div class="input-fields">
                            <label for=""> NPI : </label>
                            <input type="number" placeholder="Numero d'Identification Personelle" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Profession : </label>
                            <input type="text" placeholder="Profession" required>
                        </div>

                        <div class="input-fields">
                            <label for="">Loyer : </label>
                            <input type="number" placeholder="" required>
                        </div>
                        
                        <div class="input-fields">
                            <label for=""> Date d'integration : </label>
                            <input type="date" required>
                        </div>

                    </div>
                </div>
            </div>

            <button class="nextBtn" >
                <span>Emettre</span>
            </button>
        </form>

    </div>
    
</body>
</html>