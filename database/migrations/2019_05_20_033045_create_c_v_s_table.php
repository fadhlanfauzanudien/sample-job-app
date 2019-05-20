<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->string('name');
            $table->string('status')->default('unread');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_v_s');
    }
}
