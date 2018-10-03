<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parcelname');
            $table->string('dimensions');
            $table->string('parcelweight');
            $table->string('pickupaddress');
            $table->string('dropoffaddress');
            $table->string('pickupaddresslatitude');
            $table->string('pickupaddresslongitude');
            $table->string('dropoffaddresslatitude');
            $table->string('dropoffaddresslongitude');
            $table->string('pickupdate');
            $table->string('pickuptime');
            $table->string('price');
            $table->integer('hubId')->unsigned();
            $table->foreign('hubId')->references('id')->on('hubs');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('products');
    }
}
