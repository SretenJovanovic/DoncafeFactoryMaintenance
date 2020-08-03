<div class="tab-pane fade" id="nav-merna-oprema{{ $user->id }}" role="tabpanel" aria-labelledby="nav-merna-oprema-tab">
    <table class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NASLOV</th>
                <th scope="col">ROK</th>
                <th scope="col">PRIORITET</th>
                <th scope="col">OPIS</th>
                <th scope="col">SLIKA</th>
                <th scope="col">OBRISI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merilaReminders as $merilaReminder)
                <tr>
                
                    <th scope="row">{{ $merilaReminder->karton_merila_id }}</th>
                    <td>{{ $merilaReminder->datumPregleda }}</td>
                    <td>{{ $merilaReminder->brojZapisnika }}</td>
                    <td>{{ $merilaReminder->odgovoran }}</td>
                    <td></td>
                    <td>
                    
                    </td>
                    <td><a href="#">Obrisi</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $merilaReminders->links() }}
</div>