@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron mt-5">
        <h1 class="display-4">Pozdrav, {{ $user->name}} {{ $user->last_name}}!</h1>
        <p class="lead"></p>
        <hr class="my-4">
        <p>DoncafeFactoryMaintenance</p>
        <a class="btn btn-primary btn-lg" href="/reminder/{{ $user->id }}" role="button">Pogledaj podsetnik</a>
      </div>
</div>

@endsection
