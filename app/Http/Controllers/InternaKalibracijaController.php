<?php

namespace App\Http\Controllers;


use App\InternaKalibracija;
Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternaKalibracijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mestoUgradnje = DB::table('sektori')->get();
        
        $internaKalibracija = DB::table('interna_kalibracijas')->paginate(10);

        return view('mernaOprema.internaKalibracija.index', ['mestoUgradnje' => $mestoUgradnje, 'internaKalibracija' => $internaKalibracija ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'naziv' => 'required',
            'mestoUgradnje' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required',
            'serijskiBroj' => 'required',
            'proizvodjac' => 'required',
            'tip' => 'required',
            'godinaProizvodnje' => 'required',
            'datumNabavke' => 'required',
        ]);
    
        $karton = new internaKalibracija();
        $karton->naziv = $request->input("naziv");
        $karton->mestoUgradnje = $request->input("mestoUgradnje");
        $karton->grupa = $request->input("grupa");
        $karton->oznaka = $request->input("oznaka");
        $karton->serijskiBroj = $request->input("serijskiBroj");
        $karton->proizvodjac = $request->input("proizvodjac");
        $karton->tip = $request->input("tip");
        $karton->godinaProizvodnje = $request->input("godinaProizvodnje");
        $karton->datumNabavke = $request->input("datumNabavke");
        $karton->save();

        return redirect('internaKalibracija/spisak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kalibracija)
    {
        $internaKalibracijaMerila = DB::table('interna_kalibracijas')->find($kalibracija);
        

        $users = DB::table('users')->get();
        
    
        return view('mernaOprema.internaKalibracija.show', ['internaKalibracijaMerila' => $internaKalibracijaMerila]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
