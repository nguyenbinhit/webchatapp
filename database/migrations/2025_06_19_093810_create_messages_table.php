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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('sender_id')->default(0)->nullable(false);
            $table->integer('receiver_id')->default(0)->nullable(false);
            $table->text('content')->nullable();
            $table->integer('is_read')->default(0)->nullable(false);
            $table->string('custom_time')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
