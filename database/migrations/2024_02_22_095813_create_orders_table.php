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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id');
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('buyer_id');
            $table->integer('quantity')->nullable();
            $table->string('price')->nullable();
            $table->double('sub_total')->default(0)->nullable();
            $table->double('vat')->default(0)->nullable();
            $table->double('total')->default(0)->nullable();
            $table->string('reference_no')->nullable();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('availability')->default('On Site')->nullable(); // On Site, With Dealer
            $table->string('payment_method')->nullable();
            $table->longText('payment_details')->nullable();
            $table->integer('postcode')->nullable();
            $table->longText('comments')->nullable();
            $table->boolean('status')->default(1); //1:Pending,2:Accepted,3:completed,4:rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
