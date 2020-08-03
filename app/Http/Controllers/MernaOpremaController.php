<?php

namespace App\Http\Controllers;

use App\User;
use App\MernaOpremaSpisak;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MernaOpremaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spiskoviMerila = DB::table('merna_oprema_spisaks')->paginate(10);
        $kartonMerilas = DB::table('karton_merilas')->select('merna_oprema_spisak_id')->get();
        $users = User::all();

        return view('mernaOprema.spisakMerneOpreme.index', ['spiskoviMerila' => $spiskoviMerila, 'kartonMerilas' => $kartonMerilas, 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mernaOprema.create');
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
            'naziv' => 'required',
            'proizvodjac' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required|numeric',
            'odgovoran' => 'required',
            'uputstvo' => 'nullable',
        ]);

        auth()->user()->mernaOpremaSpisak()->create([
            'naziv' => $data['naziv'],
            'proizvodjac' => $data['proizvodjac'],
            'grupa' => $data['grupa'],
            'oznaka' => $data['oznaka'],
            'odgovoran' => $data['odgovoran'],
            'uputstvo' => $data['uputstvo'],
        ]);
        return redirect('/mernaOprema/spisak');

    }

    
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MernaOpremaSpisak $spisakMerila)
    {
        return view('mernaOprema.spisakMerneOpreme.show',compact('spisakMerila'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MernaOpremaSpisak $spisakMerila)
    {
       
        
        $users = User::all();
        return view('mernaOprema.spisakMerneOpreme.edit',compact('spisakMerila','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MernaOpremaSpisak $spisakMerila)
    {
        
        $data = request()->validate([
            'naziv' => 'required',
            'proizvodjac' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required|numeric',
            'odgovoran' => 'required',
            'uputstvo' => 'nullable',
        ]);
        
        $spisakMerila->update($data);
        return redirect('/mernaOprema/spisakMerneOpreme/'. $spisakMerila->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MernaOpremaSpisak $spisakMerila)
    {
        $karton= $spisakMerila->kartonMerila;
        $planPregleda= $spisakMerila->planPregledaModel;
        if(!empty($karton)){
            $kartonUnos = $karton->kartonMerilaUnos;
            $kartonUnos->each->delete();
        }
        if(!empty($planPregleda)){
            $planPregleda->delete();
        }
        if(!empty($karton)){
            $karton->delete();
        }
        $spisakMerila->delete();
        return redirect ('/mernaOprema/spisak');
    }
}
