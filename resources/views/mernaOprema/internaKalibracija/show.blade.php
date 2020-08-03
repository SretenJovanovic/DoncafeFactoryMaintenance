@extends('layouts.app')

@section('content')
<div class="containerNew1 mt-3 p-4">
    
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">INTERNA KALIBRACIJA  &nbsp; &nbsp;&nbsp;
                <strong>{{ $internaKalibracijaMerila->naziv }}
                        {{ $internaKalibracijaMerila->grupa }}
                        {{ $internaKalibracijaMerila->oznaka }}
                </strong>
            </h3>
        </div>
        @if(!Auth::guest())
        
            {{-- UBACI DUGME ZA DODAVANJE
                <button class="btn btn-outline-info btn-lg mb-3" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#popravkaCollapse" 
                    aria-expanded="false" 
                    aria-controls="popravkaCollapse">
                    Popravka
            </button>
            <button class="btn btn-outline-danger btn-lg mb-3 ml-4" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#overavanjeCollapse" 
                    aria-expanded="false" 
                    aria-controls="overavanjeCollapse">
                Overavanje / Etaloniranje
            </button> --}}
    </div>
    <div class="collapse" id="popravkaCollapse">
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
                                    <option value=""></option>
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
            <button type="submit" class="btn btn-primary btn-block">Unesi popravku</button>
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
                <b>Interna kalibracija merne opreme</b>
            </td>
            <td colspan="2">
                Obrazac broj: SG-SC-SA-PR-Ob.02.134-1
            </td>
        </tr>
        <tr class="col-25">
            <td>
                <b>Strana 1 od 1</b>
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
                <th scope="col" colspan="5" class="text-center">OPSTI PODACI O MERILU</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Naziv: <strong>{{ $internaKalibracijaMerila->naziv }}</strong></td>
                <td>Mesto ugradnje: <strong>{{ $internaKalibracijaMerila->mestoUgradnje }}</strong></td>
                <td>Oznaka merila: <strong>{{ $internaKalibracijaMerila->grupa }} {{ $internaKalibracijaMerila->oznaka }}</strong></td>
                <td colspan="2">Broj masine/ Serijski broj: <strong>{{ $internaKalibracijaMerila->serijskiBroj }}</strong></td>
            </tr>
            <tr>
                <td>Proizvodjac: <strong>{{ $internaKalibracijaMerila->proizvodjac }}</strong></td>
                <td colspan="2">Tip: <strong>{{ $internaKalibracijaMerila->tip }}</strong></td>
                <td>Godina proizvodnje: <strong>{{ $internaKalibracijaMerila->godinaProizvodnje }}</strong></td>
                <td>Datum nabavke: <strong>{{ $internaKalibracijaMerila->datumNabavke }}</strong></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="3" class="text-center">GODINA</th>
                <th scope="col" colspan="2" class="text-center">KALIBRACIJA*</th>
            </tr>
            <tr>
                <th scope="col" class="text-center">R.br.</th>
                <th scope="col" class="text-center">MESEC</th>
                <th scope="col" class="text-center">DAN</th>
                <th scope="col" class="text-center">POTPIS</th>
                <th scope="col" class="text-center">NAPOMENA</th>
            </tr>
        </thead>
            
            
        <tbody>
            @for ($m=1; $m<=12; ++$m)
                <tr>
                    <th>{{ $m }}</th>
                    <td>{{ date('F', mktime(0, 0, 0, $m, 1))}}</td>
                </tr>
            @endfor
        </tbody>
    </table>

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
