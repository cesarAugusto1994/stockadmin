<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAlternativePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_alternative_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_code')->nullable();
            $table->string('extension')->nullable();
            $table->string('number')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_informations');
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
        Schema::dropIfExists('user_alternative_phone');
    }
}
