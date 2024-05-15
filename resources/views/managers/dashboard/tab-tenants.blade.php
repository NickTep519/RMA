<div class="tableau">
    <table class="table-style">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Biens</th>
                <th>Quartier</th>
                <th>Loyer</th>
                <th>Solde</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td>{{$contract->tenant_name}}</td>
                    <td>{{$contract->property?->title}}</td>
                    <td>{{$contract->property?->neighborhood}}</td>
                    <td>{{number_format($contract->rent, thousands_separator: ' ')}}</td>
                    <td>
                        @if ($contract->sold)
                            ✔️
                        @else
                            ❌
                        @endif
                    </td>
                    <td>
                        <a href="{{route('managers.contract.edit',$contract)}}">Edit</a>/
                        
                        <form action="{{route('managers.contract.destroy', $contract)}}" method="post">
                            @csrf
                            @method('delete')
                            <button>sup</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>