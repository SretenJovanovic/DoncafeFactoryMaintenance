@extends('layouts.app')

@section('content')
<div class="container">
    <div><h1>{{ $user->username }}</h1></div>
    
    <div><h2>{{ $user->profile->user_id }}</h2></div>


    <div>
        <a href="#">Napravi podsetnik</a>
    </div>
    

</div>
@endsection
