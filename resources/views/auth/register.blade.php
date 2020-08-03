@extends('layouts.app')

@section('content')
<div class="container mt-3 p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label  for="name" 
                                    class="col-md-4 col-form-label text-md-right">Ime
                            </label>

                            <div class="col-md-6">
                                <input  id="name" 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="name" value="{{ old('name') }}" 
                                        autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label  for="last_name" 
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}
                            </label>

                            <div class="col-md-6">
                                <input  id="last_name" 
                                        type="text" 
                                        class="form-control @error('last_name') is-invalid @enderror" 
                                        name="last_name" 
                                        value="{{ old('last_name') }}" 
                                        autocomplete="off" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  for="username" 
                                    class="col-md-4 col-form-label text-md-right">Username
                            </label>

                            <div class="col-md-6">
                                <input  id="username" 
                                        type="text" 
                                        class="form-control @error('username') is-invalid @enderror" 
                                        name="username" 
                                        value="{{ old('username') }}" 
                                        autocomplete="off">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  for="email" 
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" 
                                       autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  for="password" 
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input  id="password" 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password" 
                                        autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  for="password-confirm" 
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}
                            </label>

                            <div class="col-md-6">
                                <input  id="password-confirm" 
                                        type="password" 
                                        class="form-control" 
                                        name="password_confirmation" 
                                        autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  for="level_id" 
                                    class="col-md-4 col-form-label text-md-right">{{ __('Rola') }}
                            </label>
                            <div class="col-md-6">
                                <select id="level_id"  
                                        class="form-control @error('level_id') is-invalid @enderror" 
                                        name="level_id" value="{{ old('level_id') }}"
                                        autofocus>
                                <option value="" label="Izaberite rolu">Izaberite rolu</option>
                                <option value="menadzer">Menadzer</option>
                                <option value="inzenjer">Inzenjer</option>
                                <option value="odrzavanje">Odrzavanje</option>
                                </select>
                                @error('level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
