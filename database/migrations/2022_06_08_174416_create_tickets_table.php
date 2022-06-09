<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('from_id');
            $table->foreign('from_id')->references('id')->on('towns')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('to_id');
            $table->foreign('to_id')->references('id')->on('towns')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('depart_time');
            $table->integer('price');
            $table->tinyInteger('available');

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
        Schema::dropIfExists('tickets');
    }
}
