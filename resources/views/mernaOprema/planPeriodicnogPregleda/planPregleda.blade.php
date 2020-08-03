@extends('layouts.app')

@section('content')
<div class="containerNew1 mt-3 p-4">
    
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">PLAN PERIODICNOG PREGLEDA MERILA</h3>
        </div>
        @if(!Auth::guest())
       
        <button class="btn btn-outline-success btn-lg mb-3" 
                type="button" 
                data-toggle="collapse" 
                data-target="#planPregledaCollapse" 
                aria-expanded="false" 
                aria-controls="planPregledaCollapse">
            Novi unos
          </button>
    </div>

    <div class="collapse" id="planPregledaCollapse">
        <form action="/mernaOprema/planPeriodicnogPregleda/planPregledaNovi" method="POST">
            @csrf<!--Provera da li je user ulogovan-->  
            <div class="card col-md-8 offset-md-2">
                <div class="card-header bg-dark text-center text-white">
                    <h5 class="pt-1"><strong>Novi plan periodicnog pregleda za merilo</strong></h3>
                </div>
                <div class="card-body">
                    <div class="row">
               
                        <div class="form-group col-md-6">
                            <label for="merilo">Naziv merila</label>
                            <select class="form-control"  name="merilo" id="merilo">
                              <option value="" selected="true" disabled>=== Izaberi merilo ===</option>
                                @foreach ($spisakMerneOpreme as $key => $spisak)
                                    @if ($spisak->imaPlan === 0 && $spisak->imaKarton === 1)
                                        <option value="{{$spisak->id}}">
                                            {{ $spisak->grupa }} {{ $spisak->oznaka }} || {{ $spisak->naziv }} 
                                        </option>
                                    @elseif ($spisak->imaPlan === 0 && $spisak->imaKarton === 0)
                                    <option style="background-color: red; color:white" value="">
                                        Merilo nema karton: {{ $spisak->grupa }} {{ $spisak->oznaka }} || {{ $spisak->naziv }} 
                                    </option>
                                    @else
                                    
                                    @endif
                                @endforeach
                               
                            </select>
                        </div>
                          
                        <div class="form-group col-md-6">
                            <label for="periodEtaloniranja">Period etaloniranja:</label>
                            <input  id="periodEtaloniranja" 
                                type="number" 
                                min="1"
                                class="form-control @error('periodEtaloniranja') is-invalid @enderror" 
                                name="periodEtaloniranja" value="{{ old('periodEtaloniranja') }}" 
                                autocomplete="off"
                                placeholder="Unesi broj meseci...">
        
                            @error('periodEtaloniranja')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-success mr-3 btn-block">DODAJ PLAN PREGLEDA ZA MERILO</button>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
    @endif
        

    
    <div class="calendar_events mt-3">
        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv merne opreme</th>
                    <th scope="col">Proizvodjac</th>
                    <th scope="col">Oznaka merila</th>
                    <th scope="col">Period etaloniranja ( mesec )</th>
                    <th scope="col">Broj zapisnika</th>
                    <th scope="col">Plan periodicnog pregleda</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($planPregleda as $plan)
                <tr>
                    <th scope="row">{{ $plan->id }}</th>
                    <td>
                        
                        <a href="/mernaOprema/planPeriodicnogPregleda/{{ $plan->id }}/show">{{ $plan->mernaOpremaSpisak->naziv }}</a>
                    </td>
                    <td scope="row">{{ $plan->mernaOpremaSpisak->proizvodjac }}</td>
                    <td scope="row">{{ $plan->mernaOpremaSpisak->grupa }} {{ $plan->mernaOpremaSpisak->oznaka }}</td>
                    <td scope="row">{{ $plan->periodEtaloniranja }}</td>
                    
                    @if (empty($plan->mernaOpremaSpisak->kartonMerila))
                        <td scope="row"></td>
                        <td scope="row"></td>
                    @else
                        @if (empty($plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()))
                        <td scope="row"></td>
                        <td scope="row">Jos uvek nije u planu</td>
                    @else
                        <td scope="row">{{ $plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()->brojZapisnika }}</td>
                        <td scope="row">{{ $plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()->vaziDo }}</td>
                        @endif
                    @endif
                    
                    
                   
                    
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </div>

              
</div>



@endsection

@section('scripts')


@endsection