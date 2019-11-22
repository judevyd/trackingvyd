<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JOFORDER extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JOFORDER', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('refno')->nullable();
            $table->string('orderno')->nullable();
            $table->string('kind_of_order')->nullable();
            $table->string('fb_sales_name')->nullable();
            $table->string('jofno')->nullable();
            $table->string('distributor_name')->nullable();
            $table->string('distributor_code')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('trackingno')->nullable();
            $table->string('date_prepared')->nullable();
            $table->string('due_date')->nullable();
            $table->string('created_by')->nullable();
            $table->string('kind_of_ring')->nullable();
            $table->string('metal')->nullable();
            $table->string('ring_size')->nullable();
            $table->string('year')->nullable();
            $table->string('karat')->nullable();
            $table->string('text_style')->nullable();
            $table->string('stone')->nullable();
            $table->string('kind_stone')->nullable();
            $table->string('weight')->nullable();
            $table->string('oxidation')->nullable();
            $table->string('inside_engrave')->nullable();
            $table->string('left_shank')->nullable();
            $table->string('top_shank')->nullable();
            $table->string('right_shank')->nullable();
            $table->string('attach_remarks')->nullable();
            $table->string('upload_image')->nullable();
            $table->string('remarks')->default(0);
            $table->string('sp_order')->default(0);
            $table->string('sp_approve')->default(0);
            $table->string('jof_status')->nullable();
            $table->string('active_date')->nullable();
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
        Schema::dropIfExists('JOFORDER');
    }
}
