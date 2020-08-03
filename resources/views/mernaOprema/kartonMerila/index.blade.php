@extends('layouts.app')

@section('content')
<div class="containerNew1 mt-3 p-4">
    
    <div class="row mb-2">
        <div class="col-md-4 pt-1">
            <h3 class="ml-5">KARTONI MERNE OPREME</h3>
        </div>
        <div class="col-md-3">
            <a class="btn btn-outline-primary border border-dark btn-lg" href="/mernaOprema/karton/create">Dodaj karton</a>
        </div>
        <div class="col-md-3 offset-md-2">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Pretraga merila"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
        

    <div class="calendar_events">
        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv merne opreme</th>
                    <th scope="col">Proizvođač</th>
                    <th scope="col">Tip merila</th>
                    <th scope="col">Oznaka merila</th>
                    <th scope="col">Mesto ugradnje</th>
                    <th scope="col">Karton merila</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($kartonMerila as $karton)
                    <tr>
                        <th scope="row">{{ $karton->id }}</th>
                        <td>{{ $karton->naziv }}</td>
                        <td>{{ $karton->proizvodjac }}</td>
                        <td>{{ $karton->tip }}</td>
                        <td>{{ $karton->grupa }} {{ $karton->oznaka }}</td>
                        <td>{{ $karton->mestoUgradnje }}</td>
                        <td style="width:20%;">
                                <a class="btn btn-success border border-dark" href="/mernaOprema/karton/{{ $karton->id }}/show">
                                    Otvori karton</a>
                                <a class="btn btn-secondary ml-2 border border-dark" href="/mernaOprema/karton/{{ $karton->id }}/izmeni">
                                    Izmeni karton</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        
        <div class="row ml-3">{{ $kartonMerila->links() }}</div> 
    </div>
              
</div>



@endsection
