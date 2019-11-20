<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JofHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jof_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('joforderid')->nullable();
            $table->string('jofno')->nullable();
            $table->string('kind_of_ring')->nullable();
            $table->string('event_time')->nullable();
            $table->string('jof_status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('jof_history');
    }
}
