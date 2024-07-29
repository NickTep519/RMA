<div class="tableau">
    <table class="table-style">
        <thead>
            <tr>
                <th>IDL</th>
                <th>Nom</th>
                <th>Quartier</th>
                <th>Loyer(CFA)</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr wire:key="{{$contract->id}}">
                    <td>
                        @if ($contract->null)
                            En cours...
                        @endif
                        {{$contract->idl}}
                    </td>
                    <td>{{$contract->tenant_name}}</td>
                    <td>{{$contract->property?->neighborhood}}</td>
                    <td>{{number_format($contract->rent, thousands_separator: ' ')}} F</td>
                    <td>
                       @forelse ($contract->rentals as $rental)
                           {{$rental->payment_status}}
                       @empty
                           Aucune location enrégistrée pour {{$month}}/{{$year}}
                       @endforelse
                    </td>
                    <td>
                        <div class="properti-buttons">
                            <a  href="{{route('managers.contract.show',$contract)}}">
                                <button class="edit-properti-button" >Info...</button>
                            </a>

                            <a  href="{{route('managers.contract.edit',$contract)}}">
                                <button class="edit-properti-button" >Edit</button>
                            </a>
                        
                            <form action="{{route('managers.contract.destroy', $contract)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="delete-properti-button">Sup</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>