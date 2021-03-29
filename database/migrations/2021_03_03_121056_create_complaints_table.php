<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('type_complaint_id')->nullable();
            $table->string('title')->nullable();
            $table->date('closing_date')->nullable();
            $table->date('incident_date')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('partner_id')->nullable();
            $table->integer('operator_id')->nullable();
            $table->integer('ressource_id')->nullable();
            $table->integer('approuved_by')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
