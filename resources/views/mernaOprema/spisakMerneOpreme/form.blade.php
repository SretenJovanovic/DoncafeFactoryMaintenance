@csrf<!--Provera da li je user ulogovan--> 
       
        <div class="row">
            <div class="row col-md-6 mt-2 offset-3">
                <h3 class="mx-auto">Izmena podataka za :  <strong>{{ $spisakMerila->naziv }}</strong></h3>
            </div>
        </div>

       
        

        <div class="form-group">
            <label  for="naziv">Naziv merne opreme:
            </label>
            <input  id="naziv" 
                type="text" 
                class="form-control @error('naziv') is-invalid @enderror" 
                name="naziv" value="{{ old('naziv') ?? $spisakMerila->naziv }}" 
                autocomplete="off">

            @error('naziv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label  for="proizvodjac">Proizvodjac merne opreme:
            </label>
            <input  id="proizvodjac" 
                type="text" 
                class="form-control @error('proizvodjac') is-invalid @enderror" 
                name="proizvodjac" value="{{ old('proizvodjac') ?? $spisakMerila->proizvodjac }}" 
                autocomplete="off" autofocus
                placeholder="Unesi proizvodjaca...">

            @error('proizvodjac')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label  for="grupa" >Grupa merila:</label>

                <select id="grupa"  
                        class="form-control @error('grupa') is-invalid @enderror" 
                        name="grupa" 
                        autofocus>
                    <option value="" label="Odaberi grupu"></option>
                    <option value="I" {{ $spisakMerila->grupa == "I" ? 'selected' : ''}}>I</option>
                    <option value="II" {{ $spisakMerila->grupa == "II" ? 'selected' : ''}}>II</option>
                    <option value="III" {{ $spisakMerila->grupa == "III" ? 'selected' : ''}}>III</option>
                    <option value="IV" {{ $spisakMerila->grupa == "IV" ? 'selected' : ''}}>IV</option>
                </select>
                    @error('grupa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                <label class="mt-2" for="oznaka">Broj oznake:</label>
                <input  id="oznaka" 
                    type="number" 
                    min="0"
                    class="form-control @error('oznaka') is-invalid @enderror" 
                    name="oznaka" value="{{ old('oznaka') ?? $spisakMerila->oznaka }}" 
                    autocomplete="off"
                    placeholder="Unesi oznaku...">

                @error('oznaka')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-8 bg-default pt-2">
                <p>I - Radni etaloni </p>
                <p>II - Merila koja se koriste u prometu</p>
                <p>III - Merila koja se koriste u proizvodnom procesu</p>
                <p>IV - Indikatori</p>
            </div>
        </div>

        <div class="form-group">
            <label  for="odgovoran">Odgovoran:</label>
            
                <select id="odgovoran"  
                        class="form-control @error('odgovoran') is-invalid @enderror" 
                        name="odgovoran"
                        autofocus>
                <option value="" label="Odgovoran"></option>
                
                </option>
                @foreach ($users as $user)
                    @if ( str_contains($spisakMerila->odgovoran, $user->name))
                    <option value="{{ $spisakMerila->odgovoran }}" selected>
                        {{ $spisakMerila->odgovoran }}
                    </option>
                    @else
                    <option value="{{ $user->name }} {{ $user->last_name }}">
                        {{ $user->name }} {{ $user->last_name }}
                    </option>
                    @endif
                @endforeach
                </select>
                @error('odgovoran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
        </div>

        <div class="form-group">
            <label  for="uputstvo">UPUTSTVO:</label>
            
                <select id="uputstvo"  
                        class="form-control @error('uputstvo') is-invalid @enderror" 
                        name="uputstvo"
                        autofocus>
                <option value="" label="Uputstvo"></option>
                <option value="1">Vaga 1</option>
                <option value="2">Vaga 2</option>
                <option value="3">Vaga 3</option>
                </select>
                @error('uputstvo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">Sacuvaj izmenu</button>