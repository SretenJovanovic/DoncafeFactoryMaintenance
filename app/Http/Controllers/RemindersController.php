<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemindersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        //Multi pagination stackoverflow resenje
        //https://stackoverflow.com/questions/24086269/laravel-multiple-pagination-in-one-page

        $myReminders = DB::table('reminders')->where('user_id',$user->id)->paginate(10, ['*'], 'licni');

        $username= $user->name.' '.$user->last_name;
        $times= [
            now(),
            now()->addMonth()
        ];
        $merilaReminders = DB::table('karton_merila_unos')->where('odgovoran',$username)->whereBetween('vaziDo',$times)->paginate(10, ['*'], 'merila');
        
        return view('reminders.index', compact('user','myReminders','merilaReminders'));
    }
    
    public function create()
    {
        return view('reminders.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'naslov' => 'required',
            'rok' => 'required',
            'prioritet' => 'required',
            'opis' => 'required',
            'image' => 'image|nullable',
        ]);
        $imagePath = '';
        if(request('image')!== null){
         $imagePath = request('image')->store('uploads','public');
        }
        else{
            $imagePath = '';
        }
        
        auth()->user()->reminders()->create([
            'naslov' => $data['naslov'],
            'rok' => $data['rok'],
            'prioritet' => $data['prioritet'],
            'opis' => $data['opis'],
            'image' => $imagePath,
        ]);

        return redirect('/reminder/' .auth()->user()->id);

    }
}