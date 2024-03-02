<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_seller', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->string('car_color')->nullable();
            /*$table->string('car_size')->nullable();
            $table->string('car_transmission')->nullable();
            $table->string('car_spec')->nullable();
            $table->string('car_availabillity')->nullable();
            $table->string('car_dor')->nullable();
            $table->text('car_body')->nullable();*/
            $table->string('car_base_price')->default(0)->nullable();
            $table->string('car_price')->default(0)->nullable();
            $table->double('car_road_tax')->default(0)->nullable();
            $table->double('car_registration_fee')->default(0)->nullable();
            $table->double('car_delivery_charge')->default(0)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_sellers');
    }
};
