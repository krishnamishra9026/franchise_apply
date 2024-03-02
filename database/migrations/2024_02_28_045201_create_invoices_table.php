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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('car_id')->nullable();
            $table->double('sub_total')->default(0)->nullable();
            $table->double('total')->default(0)->nullable();
            $table->double('vat')->default(0)->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
