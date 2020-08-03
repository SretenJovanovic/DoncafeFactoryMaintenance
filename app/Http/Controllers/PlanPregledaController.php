<?php

namespace App\Http\Controllers;

use App\MernaOpremaSpisak;
use App\User;
use App\PlanPregledaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class PlanPregledaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $planPregleda = PlanPregledaModel::paginate(10);
        $spisakMerneOpreme = MernaOpremaSpisak::all();
        $id=1;
        
        return view('mernaOprema.planPeriodicnogPregleda.planPeriodicnogPregledaShow', compact('spisakMerneOpreme','planPregleda','id'));
        return view('mernaOprema.planPeriodicnogPregleda.planPregleda', compact('spisakMerneOpreme','planPregleda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'merilo' => 'required',
            'periodEtaloniranja' => 'required',
        ]);
        $planPregleda = new PlanPregledaModel();
        $planPregleda->merna_oprema_spisak_id = $request->input("merilo");
        $planPregleda->periodEtaloniranja = $request->input("periodEtaloniranja");
        $imaPlan = MernaOpremaSpisak::find($request->input("merilo"));
        
        if($imaPlan) {
            $imaPlan->imaPlan = 1;
            $imaPlan->save();
           
        }
        
        $planPregleda->save();
        return redirect('mernaOprema/planPeriodicnogPregleda/planPregleda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
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
