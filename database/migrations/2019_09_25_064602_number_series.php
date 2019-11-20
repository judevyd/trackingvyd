<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NumberSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NumberSeries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('series_code')->default('VYD');
            $table->string('year')->nullable();
            $table->string('seriesno')->default('00000');
            $table->Integer('incrementno')->default(0);
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
        Schema::dropIfExists('NumberSeries');
    }
}
