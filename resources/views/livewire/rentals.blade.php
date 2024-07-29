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
                    <td>{{$rental->month->translatedformat('M Y')}}</td>
                    <td>{{$rental->payment_status}}</td>
                    <td>
                        @if ($rental->payment_status === 'Payé ✔️')
                            {{$rental->created_at->translatedformat('d M Y')}}
                        @else
                            --
                        @endif
                    </td>
                    <td>{{$rental->prev_payment_status}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
