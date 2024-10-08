<div class="tableau">
    
    <table class="table-style">
        <thead>
            <tr>
                <th>Mois:</th>
                <th>Status</th>
                <th>Payé le :</th>
                <th>Status Précédent</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr wire:key="{{$contract->id}}">
                    <td> {{$rental->month->translatedformat('M Y')}} </td>
                    <td>
                        @if ($rental->payment_status)
                            ✔️
                        @else
                            ❌    
                        @endif
                    </td>
                    <td>
                        @if ($rental->payment_status)
                            {{$rental->created_at->translatedformat('d M Y')}}
                        @else
                            --
                        @endif
                    </td>
                    <td>
                        @if ($rental->prev_payment_status)
                            ✔️
                        @else
                            ❌    
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
