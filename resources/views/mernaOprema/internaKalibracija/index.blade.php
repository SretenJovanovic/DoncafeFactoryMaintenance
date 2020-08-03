@extends('layouts.app')

@section('content')
<div class="containerNew1 mt-3 p-4">
    
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">INTERNA KALIBRACIJA</h3>
        </div>
        @if(!Auth::guest())
        <button class="btn btn-outline-success btn-lg mb-3" 
                type="button" 
                data-toggle="collapse" 
                data-target="#unosCollapse" 
                aria-expanded="false" 
                aria-controls="unosCollapse">
            Novi unos
          </button>
    </div>

    <div class="collapse" id="unosCollapse">
        <form action="/internaKalibracija" method="POST" enctype="multipart/form-data">
            @csrf<!--Provera da li je user ulogovan-->  
    
            <div class="row">

                <div class="form-group col-md-3">
                    <label  for="naziv">Naziv:
                    </label>
                    <input  id="naziv" 
                        type="text" 
                        class="form-control @error('naziv') is-invalid @enderror" 
                        name="naziv" value="{{ old('naziv') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi naziv...">
        
                    @error('naziv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label  for="mestoUgradnje">Mesto ugradnje:</label>
                    
                        <select id="mestoUgradnje"  
                                class="form-control @error('mestoUgradnje') is-invalid @enderror" 
                                name="mestoUgradnje" value="{{ old('mestoUgradnje') }}"
                                autofocus>
                                    <option value="" label="--------"></option>
                                @foreach ($mestoUgradnje as $sektor)
                                    <option value="{{ $sektor->naziv_sektora }}">{{ $sektor->naziv_sektora }}</option>
                                @endforeach    
                        </select>
                        @error('mestoUgradnje')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>

                <div class="form-group col-md-2">
                    <label  for="grupa" >Grupa merila:</label>

                    <select id="grupa"  
                            class="form-control @error('grupa') is-invalid @enderror" 
                            name="grupa" value="{{ old('grupa') }}"
                            autofocus>
                        <option value="" label="Odaberi grupu"></option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
                        @error('grupa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                </div>
                <div class="form-group col-md-2">
                    <label for="oznaka">Broj oznake:</label>
                    <input  id="oznaka" 
                        type="number" 
                        min="0"
                        class="form-control @error('oznaka') is-invalid @enderror" 
                        name="oznaka" value="{{ old('oznaka') }}" 
                        autocomplete="off"
                        placeholder="Unesi oznaku...">

                    @error('oznaka')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label  for="serijskiBroj">Broj Masine/Serijski broj
                    </label>
                    <input  id="serijskiBroj" 
                        type="text" 
                        class="form-control @error('serijskiBroj') is-invalid @enderror" 
                        name="serijskiBroj" value="{{ old('serijskiBroj') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi serijski broj...">
        
                    @error('serijskiBroj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row">

                <div class="form-group col-md-3">
                    <label  for="proizvodjac">Proizvodjac
                    </label>
                    <input  id="proizvodjac" 
                        type="text" 
                        class="form-control @error('proizvodjac') is-invalid @enderror" 
                        name="proizvodjac" value="{{ old('proizvodjac') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi proizvodjaca...">
        
                    @error('proizvodjac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label  for="tip">Tip:
                    </label>
                    <input  id="tip" 
                        type="text" 
                        class="form-control @error('tip') is-invalid @enderror" 
                        name="tip" value="{{ old('tip') }}" 
                        autocomplete="off" autofocus
                        placeholder="Tip merila...">
        
                    @error('tip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group col-md-3">
                    <label  for="godinaProizvodnje">Godina proizvodnje:
                    </label>
                    <input  id="godinaProizvodnje" 
                        type="text" 
                        class="form-control @error('godinaProizvodnje') is-invalid @enderror" 
                        name="godinaProizvodnje" value="{{ old('godinaProizvodnje') }}" 
                        autocomplete="off" autofocus
                        placeholder="Godina proizvodnje...">
        
                    @error('godinaProizvodnje')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group col-md-3">
                    <label  for="datumNabavke">Datum nabavke:
                    </label>
                    <input  id="datumNabavke" 
                        type="text" 
                        class="form-control @error('datumNabavke') is-invalid @enderror" 
                        name="datumNabavke" value="{{ old('datumNabavke') }}" 
                        autocomplete="off" autofocus
                        placeholder="Datum nabavke...">
        
                    @error('datumNabavke')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            
            
            
            <button type="submit" class="btn btn-primary btn-block">Dodaj na spisak interne kalibracije</button>
        </form>
    </div>
    @endif
        

    
    <div class="calendar_events mt-3">
        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv merne opreme</th>
                    <th scope="col">Mesto ugradnje</th>
                    <th scope="col">Oznaka merila</th>
                    <th scope="col">Proizvodjac</th>
                    <th scope="col">Tip</th>
                    @if(!Auth::guest())
                    <th scope="col">Interna kalibracija</th>
                    @endif
                </tr>
            </thead>
            
            <tbody>
                @foreach ($internaKalibracija as $kalibracija)
                    <tr>
                        <th scope="row">{{ $kalibracija->id }}</th>
                        <td>{{ $kalibracija->naziv }}</td>
                        <td>{{ $kalibracija->mestoUgradnje }}</td>
                        <td>{{ $kalibracija->grupa }} {{ $kalibracija->oznaka }}</td>
                        <td>{{ $kalibracija->proizvodjac }}</td>
                        <td>{{ $kalibracija->tip }}</td>
                        @if(!Auth::guest())
                        <td>
                                <a class="btn btn-primary btn-block border border-dark"  href="/internaKalibracijaShow/{{ $kalibracija->id }}">Pogledaj</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row ml-3">{{ $internaKalibracija->links() }}</div> 
    </div>

              
</div>



@endsection
