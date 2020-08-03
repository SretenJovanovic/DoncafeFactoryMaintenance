<?php

namespace App\Http\Controllers;

use App\MernaOpremaSpisak;
use App\KartonMerila;
use App\KartonMerilaUnos;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartonMerilasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kartonMerila = DB::table('karton_merilas')->paginate(10);
        return view('mernaOprema.kartonMerila.index', ['kartonMerila' => $kartonMerila]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meriloNemaKarton = MernaOpremaSpisak::all()->where('imaKarton', 0);
        return view('mernaOprema.kartonMerila.create',compact('meriloNemaKarton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store()
    {
        $data = request()->validate([
            'serijskiBroj' => 'required',
            'mestoUgradnje' => 'required',
            'tip' => 'required',
            'godinaProizvodnje' => 'required',
            'datumNabavke' => 'required',
            'merniOpseg' => 'required',
            'klasaTacnosti' => 'required',
            'klasifikacioniBroj' => 'nullable',
            'pratecaDokumentacija' => 'nullable',
            'pratecaOprema' => 'nullable',
            'napomena' => 'nullable',
        ]);
    
        $spisakOpreme = MernaOpremaSpisak::find(request()->merilo);
    
        $idSpisakMerila=request()->merilo;
        
        $karton = new kartonMerila();
        $karton->naziv = request()->naziv = $spisakOpreme->naziv;
        $karton->mestoUgradnje = request()->input("mestoUgradnje");
        $karton->grupa = request()->grupa = $spisakOpreme->grupa;
        $karton->oznaka = request()->oznaka = $spisakOpreme->oznaka;
        $karton->serijskiBroj = request()->input("serijskiBroj");
        $karton->proizvodjac = request()->proizvodjac = $spisakOpreme->proizvodjac;
        $karton->tip = request()->input("tip");
        $karton->godinaProizvodnje = request()->input("godinaProizvodnje");
        $karton->datumNabavke = request()->input("datumNabavke");
        $karton->merniOpseg = request()->input("merniOpseg");
        $karton->klasaTacnosti = request()->input("klasaTacnosti");
        $karton->klasifikacioniBroj = request()->input("klasifikacioniBroj");
        $karton->pratecaDokumentacija = request()->input("pratecaDokumentacija");
        $karton->pratecaOprema = request()->input("pratecaOprema");
        $karton->napomena = request()->input("napomena");
        $karton->merna_oprema_spisak_id = $idSpisakMerila; //The id from the route
        
        $imaKarton = MernaOpremaSpisak::find($idSpisakMerila);
        if($imaKarton) {
            $imaKarton->imaKarton = 1;
            $imaKarton->save();
        }

        $karton->save();
        return redirect('mernaOprema/karton');
    }

    public function popravkaStore(Request $request, $kartonId) //the Id from the route
    {
        $this->validate($request,[
            'datumPregleda' => 'nullable',
            'vaziDo' => 'nullable',
            'brojZapisnika' => 'nullable',
            'odgovoran' => 'required',
            'datumPopravke' => 'nullable',
            'opisPopravke' => 'nullable',
        ]);

        $kartonUnos = new kartonMerilaUnos();
        $kartonUnos->datumPregleda = $request->input("datumPregleda");
        $kartonUnos->vaziDo = $request->input("vaziDo");
        $kartonUnos->brojZapisnika = $request->input("brojZapisnika");
        $kartonUnos->odgovoran = $request->input("odgovoran");
        $kartonUnos->datumPopravke = $request->input("datumPopravke");
        $kartonUnos->opisPopravke = $request->input("opisPopravke");
        $kartonUnos->karton_merila_id = $kartonId; //The id from the route

        $kartonUnos->save();

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($karton)
    {
        $kartoni = DB::table('karton_merilas')->find($karton);
        $spisakPopravki =  DB::table('karton_merila_unos')->where('karton_merila_id',$karton)->orderBy('datumPopravke','DESC')->paginate(10);
        $id=1;

        $users = DB::table('users')->get();

        return view('mernaOprema.kartonMerila.show', ['kartoni' => $kartoni,
                                        'spisakPopravki' => $spisakPopravki,
                                        'users' => $users,
                                        'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KartonMerila $karton)
    {
        
        return view('mernaOprema.kartonMerila.edit',compact('karton'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($kartonMerila)
    {
        $data = request()->validate([
            'naziv' => 'required',
            'mestoUgradnje' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required',
            'serijskiBroj' => 'required',
            'proizvodjac' => 'required',
            'tip' => 'required',
            'godinaProizvodnje' => 'required',
            'datumNabavke' => 'required',
            'merniOpseg' => 'required',
            'klasaTacnosti' => 'required',
            'klasifikacioniBroj' => 'nullable',
            'pratecaDokumentacija' => 'nullable',
            'pratecaOprema' => 'nullable',
            'napomena' => 'nullable',
        ]);
    
        KartonMerila::find($kartonMerila)->update($data);
        return redirect('mernaOprema/karton');
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
