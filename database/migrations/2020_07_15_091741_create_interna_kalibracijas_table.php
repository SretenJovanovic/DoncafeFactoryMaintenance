<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternaKalibracijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interna_kalibracijas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('naziv');
            $table->string('mestoUgradnje');
            $table->string('grupa');
            $table->string('oznaka');
            $table->string('serijskiBroj');
            $table->string('proizvodjac');
            $table->string('tip');
            $table->string('godinaProizvodnje');
            $table->string('datumNabavke');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interna_kalibracijas');
    }
}
