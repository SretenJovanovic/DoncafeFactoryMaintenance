@extends('layouts.app')

@section('content')
<div class="container">
    
    <!--FORMA-->
    <form class="bg-dark p-4 text-white mt-5" action="/mernaOprema/spisakMerneOpreme/{{ $spisakMerila->id }}" method="POST">
        @method('PATCH')

@include('mernaOprema.spisakMerneOpreme.form')

    </form>
              
</div>



@endsection
