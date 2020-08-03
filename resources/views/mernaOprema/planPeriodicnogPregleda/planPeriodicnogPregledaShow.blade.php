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
                                        Merilo nema karton: {{ $spisak->naziv }} ||  {{ $spisak->grupa }} {{ $spisak->oznaka }}
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
        

    <div style="height: 20px"></div>
    <div class="border border-dark p-5">
    <table class="table">
        <tr>
            <td colspan="4">
                STRAUSS ADRIATIC - PR
                <img src="{{ asset('img/image1.jpg') }}" class="img float-right">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b>Plan periodicnog pregleda merila</b>
            </td>
            <td colspan="2">
                Obrazac broj: SG-SC-SA-PR-Ob.02.128-1
            </td>
        </tr>
        <tr class="col-25">
            <td>
                <b>Strana 1 od 2</b>
            </td>
            <td style="border-right: 0px;">
                Kopija br.
            </td>
            <td>
                Važi od: 13.08.2009.
            </td>
            <td>
            </td>
        </tr>
    </table>


    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="1" class="text-center">ID</th>
                <th scope="col" colspan="1" class="text-center">Naziv merne opreme</th>
                <th scope="col" colspan="1" class="text-center">Oznaka merila</th>
                <th scope="col" colspan="1" class="text-center" style="width:15%">Period etaloniranja ( mesec )</th>
                <th scope="col" colspan="1" class="text-center">VREME PERIODICNOG PREGLEDA</th>
                <th scope="col" colspan="1" class="text-center">Broj zapisnika</th>
                <th scope="col" colspan="1" class="text-center">NAPOMENA</th>
            </tr>
        </thead>
            
            
        <tbody>
                @foreach ($planPregleda as $plan)
                    <tr>
                        <th> {{ $id++ }}</th>
                        <td>{{ $plan->mernaOpremaSpisak->naziv }}</td>
                        <td>{{ $plan->mernaOpremaSpisak->grupa }} {{ $plan->mernaOpremaSpisak->oznaka }}</td>
                        <td>{{ $plan->periodEtaloniranja }}</td>
                        @if (empty($plan->mernaOpremaSpisak->kartonMerila))
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row"></td>
                        @else
                        @if (empty($plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()))
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row">Jos uvek nije u planu</td>
                        @else
                        <td scope="row">{{ $plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()->vaziDo }}</td>
                        <td scope="row">{{ $plan->mernaOpremaSpisak->kartonMerila->kartonMerilaUnos->first()->brojZapisnika }}</td>
                        <td scope="row"></td>
                        @endif
                    @endif 
                    </tr>
                @endforeach
                @for ($i = $planPregleda->count(); $i < 10; $i++)
                    <tr style="height: 70px">
                        <th scope="row"> {{ $i+1 }}</th>     
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                 
                        <td>&nbsp</th>
                    </tr>
                    @endfor
                  
        </tbody>
        
    </table>
    {{ $planPregleda->links() }}
    <table class="table tableOdobrenje">
        <thead>
            <tr>
                <th colspan="2">
                    Izradio: Masic Nemanja, Menadzer odrzavanja
                </th>
                <th colspan="2">
                    Odobrio: Zivkovic Milan, Tehnicki direktor
                </th>
            </tr>
            <tr>
                <th>
                    Potpis:
                </th>
                <th>
                    Datum: 15.06.2009.
                </th>
                <th>
                    Potpis:
                </th>
                <th>
                    Datum: 12.08.2009.
                </th>
            </tr>
        </thead>
    </table>
</div>      
</div>



@endsection
