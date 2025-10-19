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
        Schema::create('kindergarten_social_networks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kindergarten_id')->constrained()->cascadeOnDelete();
            $table->foreignId('social_network_id')->constrained()->cascadeOnDelete();
            $table->string('url'); // Bog'cha uchun social tarmoq URL
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();

            // Bir bog'cha uchun bitta social network faqat bir marta
            $table->unique(['kindergarten_id', 'social_network_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kindergarten_social_networks');
    }
};
