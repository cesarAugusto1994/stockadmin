<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nickname');
            $table->datetime('registration_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('country_id');
            $table->string('email');
            $table->string('user_type');
            $table->string('logo')->nullable();
            $table->integer('points');
            $table->string('site_id');
            $table->string('permalink');
            $table->string('seller_experience');
            $table->string('secure_email');
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
        Schema::dropIfExists('user_informations');
    }
}
