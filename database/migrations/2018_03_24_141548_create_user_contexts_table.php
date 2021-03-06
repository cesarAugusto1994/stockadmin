<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_context', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device')->nullable();
            $table->string('flow')->nullable();
            $table->string('source')->nullable();
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
        Schema::dropIfExists('user_context');
    }
}
