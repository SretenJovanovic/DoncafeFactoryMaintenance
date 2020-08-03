<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPregledaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_pregleda_models', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('merna_oprema_spisak_id')->index();
            
            $table->integer('periodEtaloniranja');

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
        Schema::dropIfExists('plan_pregleda_models');
    }
}
