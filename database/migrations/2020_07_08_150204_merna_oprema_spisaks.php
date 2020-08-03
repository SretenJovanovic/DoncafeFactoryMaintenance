<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MernaOpremaSpisaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merna_oprema_spisaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('naziv');
            $table->string('proizvodjac');
            $table->string('grupa');
            $table->string('oznaka');
            $table->string('odgovoran');
            $table->string('uputstvo')->nullable();
            
            $table->boolean('imaPlan')->default(0);
            $table->boolean('imaKarton')->default(0);
            $table->timestamps();
        
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merna_oprema_spisaks');
    }
}
