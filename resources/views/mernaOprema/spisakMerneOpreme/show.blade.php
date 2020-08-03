@extends('layouts.app')

@section('content')
<div class="containerNew1 mt-3 p-4">
    <div class="row mb-3">
        <a class="btn btn-primary border border-dark text-white" 
    href="{{ url()->previous() }}"><- Nazad
</a> 

    </div>
    <div class="row">

        <div class="col-md-4">
            <h2 class="pl-4">Detalji za: <strong>{{ $spisakMerila->naziv }}</strong></h2>
        </div>
        <div class="col-md-4 offset-md-4">
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-warning border border-dark" 
                        href="/mernaOprema/spisakMerneOpreme/{{ $spisakMerila->id }}/edit">Izmeni merilo
                    </a>  
                </div> 
                <div class="col-md-4">
                    <form action="/mernaOprema/spisakMerneOpreme/{{ $spisakMerila->id }}" method="POST">
                        @method('DELETE') 
                        @csrf<!--Provera da li je user ulogovan--> 
                        <button type="submit" class="btn btn-danger border border-dark text-white">Obrisi merilo</button>
                    </form>
                </div>  
            </div>
            
        </div>     
        
    </div>
    <hr>
    <div class="row pt-1">
        <div class="col-md-6">
            <p>Naziv: <strong>{{ $spisakMerila->naziv }}</strong></p>
            <p>ID: <strong>{{ $spisakMerila->id }}</strong></p>
            <p>Proizvodjac: <strong>{{ $spisakMerila->proizvodjac }}</strong></p>
            <p>Grupa i oznaka: <strong>{{ $spisakMerila->grupa }}-{{ $spisakMerila->oznaka }}</strong></p>
            <p>Odgovoran: <strong>{{ $spisakMerila->odgovoran }}</strong></p>
            <p>Uputstvo: <strong>{{ $spisakMerila->uputstvo }}</strong></p>
        </div>
    </div>
    


</div>

@endsection

