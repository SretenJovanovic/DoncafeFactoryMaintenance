<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartonMerilaUnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karton_merila_unos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('karton_merila_id')->index();
            
            $table->date('datumPregleda')->nullable();
            $table->date('vaziDo')->nullable();         
            $table->string('brojZapisnika')->nullable();
            $table->string('odgovoran');
            $table->date('datumPopravke')->nullable();
            $table->string('opisPopravke')->nullable();
            $table->timestamps();

            $table->foreign('karton_merila_id')->references('id')->on('karton_merilas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karton_merila_unos');
    }
}
