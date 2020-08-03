<form class="bg-dark p-4 text-white mt-5" action="/mernaOprema/spisakMerneOpreme/{{ $spisakMerila->id }}" method="POST">
    @method('PATCH')

@include('mernaOprema.spisakMerneOpreme.form')

</form>