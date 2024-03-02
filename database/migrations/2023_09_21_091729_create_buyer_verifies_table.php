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
        Schema::create('buyer_verifies', function (Blueprint $table) {
            $table->integer('buyer_id');
            $table->string('token');
            $table->timestamps();
        });

        Schema::table('buyers', function (Blueprint $table) {
            $table->boolean('is_email_verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_verifies');
    }
};
