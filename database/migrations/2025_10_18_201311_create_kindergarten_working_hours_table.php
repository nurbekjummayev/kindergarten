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
        Schema::create('kindergarten_working_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kindergarten_id')->constrained()->cascadeOnDelete();
            $table->enum('day_of_week', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->boolean('is_open')->default(true); // Ochiq yoki yopiq (dam olish kuni)
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->timestamps();

            // Bir bog'cha uchun bir kun faqat bir marta
            $table->unique(['kindergarten_id', 'day_of_week']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kindergarten_working_hours');
    }
};
