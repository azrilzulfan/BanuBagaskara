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
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number', 30)->unique();
            $table->string('sender_name', 100);
            $table->string('phone_number', 30);
            $table->text('address');
            $table->string('kelurahan', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->string('subject', 200);
            $table->longText('description');
            $table->string('status', 20)->default('Baru');
            $table->string('priority', 20)->default('Sedang');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};
