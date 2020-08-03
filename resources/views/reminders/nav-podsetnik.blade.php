<div    class="tab-pane fade show active" 
        id="nav-podsetnik{{ $user->id }}" 
        role="tabpanel" 
        aria-labelledby="nav-podsetnik-tab"> 
                    
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
            @foreach ($myReminders as $myReminder)
                @if ($myReminder->prioritet == 'srednji')
                <tr class="table-warning">
                    <th scope="row">{{ $myReminder->id }}</th>
                    <td>{{ $myReminder->naslov }}</td>
                    <td>{{ $myReminder->rok }}</td>
                    <td>{{ $myReminder->prioritet }}</td>

                    <td>
                        <a href="#" data-toggle="modal" data-target="#opisModal{{ $myReminder->naslov }}">
                            <div class="myEllipsis">{{ $myReminder->opis }}
                            </div>
                        </a>
                    </td>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="opisModal{{ $myReminder->naslov }}" tabindex="-1" role="dialog" aria-labelledby="opisModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg col-md-8 mx-auto pt-2 pb-3 mb-3" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="opisModalLabel">Opis podsetnika:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="text-white" aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <h4>Naslov: <b>{{ $myReminder->naslov }}</b></h4>
                                    <hr>
                                    <p style="text-indent:2em;">
                                        {{ $myReminder->opis }}
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    
                    <td>
                        @if ($myReminder->image !== '')
                        <a href="/storage/{{ $myReminder->image }}">
                            Pogledaj sliku
                            </a>
                            @else
                        Ne postoji slika
                            @endif
                    </td>
                    <td>
                        <a href="#">Obrisi</a>
                    </td>
                </tr>
                @elseif($myReminder->prioritet == 'visok')
                    <tr class="table-danger">
                        <th scope="row">{{ $myReminder->id }}</th>
                        <td>{{ $myReminder->naslov }}</td>
                        <td>{{ $myReminder->rok }}</td>
                        <td>{{ $myReminder->prioritet }}</td>

                        <td style="width:200px;">
                            <a href="#" data-toggle="modal" data-target="#opisModal{{ $myReminder->naslov }}">
                                <div class="myEllipsis">{{ $myReminder->opis }}
                                </div>
                            </a>
                        </td>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="opisModal{{ $myReminder->naslov }}" tabindex="-1" role="dialog" aria-labelledby="opisModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg col-md-8 mx-auto pt-2 pb-3 mb-3" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="opisModalLabel">Opis podsetnika:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-white" aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Naslov: <b>{{ $myReminder->naslov }}</b></h4>
                                        <hr>
                                        <p style="text-indent:2em;">
                                            {{ $myReminder->opis }}
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                         
                        <td>
                            @if ($myReminder->image !== '')
                            <a href="/storage/{{ $myReminder->image }}">
                                Pogledaj sliku
                                </a>
                                @else
                            Ne postoji slika
                                @endif
                        </td>
                        <td>
                            <a href="#">Obrisi</a>
                        </td>
                    </tr>
                @else 
                    <tr class="table-secondary">
                        <th scope="row">{{ $myReminder->id }}</th>
                        <td>{{ $myReminder->naslov }}</td>
                        <td>{{ $myReminder->rok }}</td>
                        <td>{{ $myReminder->prioritet }}</td>

                        <td>
                            <a href="#" data-toggle="modal" data-target="#opisModal{{ $myReminder->naslov }}">
                                <div class="myEllipsis">{{ $myReminder->opis }}
                                </div>
                            </a>
                        </td>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="opisModal{{ $myReminder->naslov }}" tabindex="-1" role="dialog" aria-labelledby="opisModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg col-md-8 mx-auto pt-2 pb-3 mb-3" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="opisModalLabel">Opis podsetnika:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-white" aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Naslov: <b>{{ $myReminder->naslov }}</b></h4>
                                        <hr>
                                        <p style="text-indent:2em;">
                                            {{ $myReminder->opis }}
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                        <td>
                            @if ($myReminder->image !== '')
                            <a href="/storage/{{ $myReminder->image }}">
                                Pogledaj sliku
                                </a>
                                @else
                            Ne postoji slika
                                @endif
                        </td>
                        <td>
                            <a href="#">Obrisi</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    {{ $myReminders->links() }}
</div>