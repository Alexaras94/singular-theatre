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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // $table->string("title", 255);
            $table->integer("capacity");
            $table->date("venue_date");
            $table->time("venue_time");
            $table->string("location", 255);
            $table->integer('free_seats')->nullable();
            // $table->string("description");
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
};
