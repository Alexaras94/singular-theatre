<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('venue_id')->unsigned()->index();
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->string('username');
            $table->integer('number_of_seats');
            $table->string('email');
            $table->string('company');
            $table->string('phone_number');
            $table->enum('terms', ['ON', 'OFF']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
