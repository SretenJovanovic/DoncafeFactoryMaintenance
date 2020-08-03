@extends('layouts.app')

@section('content')

<div class="containerNew">
    <div class="row body-bg-color">
        <div class="col-md-2 body-bg-color pt-3">
            <div class="bg-light border-right " id="sidebar-wrapper">
                <div class="list-group list-group-flush" id="nav-tab" role="tablist">
                        <a  class="list-group-item list-group-item-action" 
                            data-toggle="tab" 
                            href="#nav-podsetnik{{ $user->id }}" 
                            role="tab">
                            Licni podsetnik
                        </a>
                        <a  class="list-group-item list-group-item-action" 
                            data-toggle="tab" 
                            href="#nav-oprema{{ $user->id }}" 
                            role="tab">
                            Oprema
                        </a>
                        <a  class="list-group-item list-group-item-action" 
                            data-toggle="tab" 
                            href="#nav-merna-oprema{{ $user->id }}" 
                            role="tab">
                            Merna oprema
                        </a>
                        @if ($user->level_id == 'menadzer')
                            <a  class="list-group-item list-group-item-action" 
                                data-toggle="tab" 
                                href="#nav-interna-kalibracija{{ $user->id }}" 
                                role="tab">
                                Interna kalibracija
                            </a>
                        @endif
                                    <!-- Button trigger modal -->
                        @if(!Auth::guest())
                            <a  class="list-group-item list-group-item-action border-top border-dark bg-dark text-white mt-3" data-toggle="modal" 
                            data-target="#licniPodsetnik">Dodaj novi podsetnik</a>
                        @endif

                    @include('reminders.create')

                    <!--ODRADITI NAV LISTE ZA SVE-->
                </div>
            </div>
        </div>
    

        <div class="body-bg-color" style="width:3%">
        </div>

        <div class="col-md-9 mt-3 bg-light pt-3">
            <div class="row">
                <div class="row col-md-6 mt-2">
                        <h3 class="ml-5">Lista podsetnika</h3>
                </div>
            </div>
           
            <div class="tab-content" id="nav-tabContent">
                 {{-- Including reminders/nav-podsetnik.blade.php --}}
                @include('reminders.nav-podsetnik')

                {{-- Including reminders/nav-oprema.blade.php --}}
                @include('reminders.nav-oprema')

                {{-- Including reminders/nav-merna-oprema.blade.php --}}
                @include('reminders.nav-merna-oprema')
            </div>
        </div>
    </div>
</div>
    {{-- Ponovno otvaranje modal windowa ako je verifikacija inputa neuspesna --}}
    @if (count($errors) > 0)
        <script type="application/javascript">
            $( document ).ready(function() {
                $('#licniPodsetnik').modal('show');
            });
        </script>
    @endif  
    {{-- END --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

    $(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#nav-tab a[href="' + activeTab + '"]').tab('show');
	}
});

</script>

@endsection
