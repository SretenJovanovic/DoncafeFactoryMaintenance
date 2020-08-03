<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartonMerilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karton_merilas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('merna_oprema_spisak_id')->index();
            
            $table->string('naziv');
            $table->string('mestoUgradnje');
            
            $table->string('grupa');
            $table->string('oznaka');
            $table->string('serijskiBroj');
            $table->string('proizvodjac');
            $table->string('tip');
            $table->string('godinaProizvodnje');
            $table->string('datumNabavke');
            $table->string('merniOpseg');
            $table->string('klasaTacnosti');
            $table->string('klasifikacioniBroj')->nullable();
            $table->string('pratecaDokumentacija')->nullable();
            $table->string('pratecaOprema')->nullable();
            $table->string('napomena')->nullable();

            $table->timestamps();

            $table->foreign('merna_oprema_spisak_id')->references('id')->on('merna_oprema_spisaks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karton_merilas');
    }
}
