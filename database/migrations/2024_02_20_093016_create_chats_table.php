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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('sendor')->nullable();
            $table->string('sendor_id')->nullable();
            $table->string('receiver')->nullable();
            $table->string('receiver_id')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['read', 'unread'])->default('unread');
            $table->enum('admin_status', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
