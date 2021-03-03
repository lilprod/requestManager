<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->nullable();
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->mediumText('address')->nullable();
            $table->char('gender',1)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('ethnic_group')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('rhesus')->nullable();
            $table->string('profession')->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('status')->default(0);
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->integer('user_id')->nullable();
            $table->datetime('last_visit')->nullable();
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
        Schema::dropIfExists('ressources');
    }
}
