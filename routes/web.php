<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/profile/{user}', 'ProfilesController@index');

Route::get('/reminder/create', 'RemindersController@create');
Route::get('/reminder/{user}', 'RemindersController@index');
Route::post('/reminder', 'RemindersController@store');

//Spisak merne opreme
Route::get('/mernaOprema/spisak','MernaOpremaController@index');
Route::post('/mernaOprema','MernaOpremaController@store');
Route::get('/mernaOprema/spisakMerneOpreme/{spisakMerila}','MernaOpremaController@show');
Route::get('/mernaOprema/spisakMerneOpreme/{spisakMerila}/edit','MernaOpremaController@edit');
Route::patch('/mernaOprema/spisakMerneOpreme/{spisakMerila}','MernaOpremaController@update');
Route::delete('/mernaOprema/spisakMerneOpreme/{spisakMerila}','MernaOpremaController@destroy');


//Karton merne opreme i dodavanje novih unosa
Route::get('/mernaOprema/karton','KartonMerilasController@index');
Route::get('/mernaOprema/karton/create', 'KartonMerilasController@create');
Route::post('/mernaOprema/karton','KartonMerilasController@store');
Route::get('/mernaOprema/karton/{karton}/show', 'KartonMerilasController@show');
Route::get('/mernaOprema/karton/{karton}/izmeni','KartonMerilasController@edit');
Route::patch('/mernaOprema/karton/{karton}','KartonMerilasController@update');

Route::post('/mernaOprema/karton/{merilo}/popravka','KartonMerilasController@popravkaStore');


//Interna kalibracija merila
Route::get('/internaKalibracija/spisak','InternaKalibracijaController@index');
Route::post('/internaKalibracija','InternaKalibracijaController@store');
Route::get('/internaKalibracijaShow/{kalibracija}', 'InternaKalibracijaController@show');

//Plan periodicnog pregleda merila
Route::get('/mernaOprema/planPeriodicnogPregleda/planPregleda','PlanPregledaController@index');
Route::post('/mernaOprema/planPeriodicnogPregleda/planPregledaNovi', 'PlanPregledaController@store');
Route::get('/mernaOprema/planPeriodicnogPregleda/show', 'PlanPregledaController@index');
