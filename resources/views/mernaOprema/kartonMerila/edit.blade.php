@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    <!--FORMA-->
    <form class="bg-dark p-4 text-white" action="/mernaOprema/karton/{{ $karton->id }}" method="POST">
        @method('PATCH')

        @csrf<!--Provera da li je user ulogovan--> 
       
       

        <div class="row">
            <div class="row col-md-6 mt-2 offset-3">
                <h3 class="mx-auto">KARTON MERNE OPREME</h3>
            </div>
        </div>

        <div class="row">           
            <div class="form-group col-md-4">
                <label  for="naziv">Naziv
                </label>
                <input  id="naziv" 
                    type="text" 
                    class="form-control bg-secondary text-white  @error('naziv') is-invalid @enderror" 
                    name="naziv" value="{{ $karton->naziv }}" 
                    autocomplete="off" readonly>

                @error('naziv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label  for="proizvodjac">Proizvodjac
                </label>
                <input  id="proizvodjac" 
                    type="text" 
                    class="form-control bg-secondary text-white  @error('proizvodjac') is-invalid @enderror" 
                    name="proizvodjac" value="{{ $karton->proizvodjac }}" 
                    autocomplete="off" readonly>

                @error('proizvodjac')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label  for="grupa">Grupa
                </label>
                <input  id="grupa" 
                    type="text" 
                    class="form-control  bg-secondary text-white @error('grupa') is-invalid @enderror" 
                    name="grupa" value="{{ $karton->grupa }}" 
                    autocomplete="off" readonly>

                @error('grupa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label  for="oznaka">Oznaka
                </label>
                <input  id="oznaka" 
                    type="text" 
                    class="form-control bg-secondary text-white @error('oznaka') is-invalid @enderror" 
                    name="oznaka" value="{{ $karton->oznaka }}" 
                    autocomplete="off" readonly>

                @error('oznaka')
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
                            name="mestoUgradnje" 
                            autofocus>
                    <option value="{{ $karton->mestoUgradnje }}" selected>{{ $karton->mestoUgradnje }}</option>
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
                    name="serijskiBroj" value="{{ $karton->serijskiBroj }}" 
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
                    name="tip" value="{{ $karton->tip }}" 
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
                    name="godinaProizvodnje" value="{{ $karton->godinaProizvodnje }}" 
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
                    name="datumNabavke" value="{{ $karton->datumNabavke }}" 
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
                    name="merniOpseg" value="{{ $karton->merniOpseg }}" 
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
                    name="klasaTacnosti" value="{{ $karton->klasaTacnosti }}" 
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
                    name="klasifikacioniBroj" value="{{ $karton->klasifikacioniBroj }}" 
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
                    name="pratecaDokumentacija" value="{{ $karton->pratecaDokumentacija }}" 
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
                    name="pratecaOprema" value="{{ $karton->pratecaOprema }}" 
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
                name="napomena" value="{{ $karton->napomena }}" 
                autocomplete="off" autofocus
                placeholder="Napomena...">

            @error('napomena')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

            
        <button type="submit" class="btn btn-primary btn-block">IZMENI KARTON</button>
    </form>
              
</div>



@endsection
