@extends('layouts.app')

@section('content')
<div class="container">
    
    <!--FORMA-->
    <form class="bg-dark p-4 text-white mt-5" action="/mernaOprema/karton" method="POST" enctype="multipart/form-data">
        @csrf<!--Provera da li je user ulogovan--> 

        <div class="row">
            <div class="row col-md-6 mt-2 offset-3">
                <h3 class="mx-auto">KARTON MERNE OPREME</h3>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label  for="merilo">Odaberite merilo iz liste:</label>
                
                    <select id="merilo"  
                            class="form-control @error('merilo') is-invalid @enderror" 
                            name="merilo">
                            @foreach ($meriloNemaKarton as $merilo)
                            <option value="{{ $merilo->id }}">{{ $merilo->naziv }}, {{ $merilo->proizvodjac }}, {{ $merilo->grupa }}-{{ $merilo->oznaka }}</option>
                            @endforeach
                    </select>
                    @error('merilo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
            </div>
        </div>
        <div class="row">           
            <div class="form-group col-md-4">
                <label  for="mestoUgradnje">Mesto ugradnje</label>
                
                    <select id="mestoUgradnje"  
                            class="form-control @error('mestoUgradnje') is-invalid @enderror" 
                            name="mestoUgradnje" value="{{ old('mestoUgradnje') }}"
                            autofocus>
                    <option value="Laboratorija">Laboratorija</option>
                    <option value="Mlinovi">Mlinovi</option>
                    <option value="Proizvodnja">Proizvodnja</option>
                    </select>
                    @error('mestoUgradnje')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
            </div>
            <div class="form-group col-md-4">
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
    
            <div class="form-group col-md-4">
                <label  for="tip">Tip
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
        </div>
     
        <div class="row">
            <div class="form-group col-md-3">
                <label  for="godinaProizvodnje">Godina proizvodnje
                </label>
                <input  id="godinaProizvodnje" 
                    type="number" minlength="4" maxlength="4"
                    class="form-control @error('godinaProizvodnje') is-invalid @enderror" 
                    name="godinaProizvodnje" value="{{ old('godinaProizvodnje') }}" 
                    autocomplete="off" autofocus
                    placeholder="Godina proizvodnje merila...">

                @error('godinaProizvodnje')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label  for="datumNabavke">Datum nabavke
                </label>
                <input  id="datumNabavke" 
                    type="text" 
                    class="form-control @error('datumNabavke') is-invalid @enderror" 
                    name="datumNabavke" value="{{ old('datumNabavke') }}" 
                    autocomplete="off" autofocus
                    placeholder="Datum nabavke merila...">

                @error('datumNabavke')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label  for="merniOpseg">Merni opseg
                </label>
                <input  id="merniOpseg" 
                    type="text" 
                    class="form-control @error('merniOpseg') is-invalid @enderror" 
                    name="merniOpseg" value="{{ old('merniOpseg') }}" 
                    autocomplete="off" autofocus
                    placeholder="Merni opseg merila...">

                @error('merniOpseg')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label  for="klasaTacnosti">Klasa tacnosti
                </label>
                <input  id="klasaTacnosti" 
                    type="text" 
                    class="form-control @error('klasaTacnosti') is-invalid @enderror" 
                    name="klasaTacnosti" value="{{ old('klasaTacnosti') }}" 
                    autocomplete="off" autofocus
                    placeholder="Klasa tacnosti merila...">

                @error('klasaTacnosti')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            
        <div class="row">
            <div class="form-group col-md-4">
                <label  for="klasifikacioniBroj">Klasifikacioni broj
                </label>
                <input  id="klasifikacioniBroj" 
                    type="text" 
                    class="form-control @error('klasifikacioniBroj') is-invalid @enderror" 
                    name="klasifikacioniBroj" value="{{ old('klasifikacioniBroj') }}" 
                    autocomplete="off" autofocus
                    placeholder="Klasifikacioni broj merila...">

                @error('klasifikacioniBroj')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label  for="pratecaDokumentacija">Prateca dokumentacija
                </label>
                <input  id="pratecaDokumentacija" 
                    type="text" 
                    class="form-control @error('pratecaDokumentacija') is-invalid @enderror" 
                    name="pratecaDokumentacija" value="{{ old('pratecaDokumentacija') }}" 
                    autocomplete="off" autofocus
                    placeholder="Prateca dokumentacija...">

                @error('pratecaDokumentacija')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label  for="pratecaOprema">Prateca oprema
                </label>
                <input  id="pratecaOprema" 
                    type="text" 
                    class="form-control @error('pratecaOprema') is-invalid @enderror" 
                    name="pratecaOprema" value="{{ old('pratecaOprema') }}" 
                    autocomplete="off" autofocus
                    placeholder="Prateca oprema...">
    
                @error('pratecaOprema')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            

        <div class="form-group">
            <label  for="napomena">Napomena
            </label>
            <input  id="napomena" 
                type="text" 
                class="form-control @error('napomena') is-invalid @enderror" 
                name="napomena" value="{{ old('napomena') }}" 
                autocomplete="off" autofocus
                placeholder="Napomena...">

            @error('napomena')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

            
        <button type="submit" class="btn btn-primary btn-block">DODAJ KARTON</button>
    </form>
              
</div>



@endsection
