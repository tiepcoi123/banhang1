<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvided extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provided', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('time_start');
            $table->date('time_end');
            $table->decimal('price');
            $table->string('image')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('provided');
    }
}
