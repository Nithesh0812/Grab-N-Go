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
        Schema::create('book_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('artists');
            $table->string('checkindate');
            $table->string('checkintime');
            $table->string('mpesa');
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
        Schema::dropIfExists('book_sessions');
    }
};
