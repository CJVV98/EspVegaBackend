<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePqrsAnsweredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrs_answered', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pqr_id')->unsigned();
            $table->string('reply');
            $table->foreign('pqr_id')->references('id')->on('pqrs');
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
        Schema::dropIfExists('pqrs_answered');
    }
}
