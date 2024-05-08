<div class="tableau">
    <table class="table-style">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Biens</th>
                <th>Quartier</th>
                <th>Loyer</th>
                <th>Solde</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td>{{$tenant->name}}</td>
                    <td>{{$tenant->property?->title}}</td>
                    <td>{{$tenant->property?->neighborhood}}</td>
                    <td>{{number_format($tenant->rent, thousands_separator: ' ')}}</td>
                    <td>
                        @if ($tenant->sold)
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