<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('type')->default(0)->comment('0: loại khuyến mại có mã, 1: là loại km ko có mã');
            $table->string('code')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('count_apply')->nullable()->comment('nếu = null:thì không giới hạn số lượt, ');
            $table->integer('discount')->default(0);
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
        Schema::dropIfExists('promotion');
    }
}
