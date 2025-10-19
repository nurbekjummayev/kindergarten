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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kindergarten_id')->constrained()->cascadeOnDelete();

            // Farzand ma'lumotlari
            $table->string('child_first_name');
            $table->string('child_last_name');
            $table->string('child_father_name');
            $table->date('child_birth_date');
            $table->string('child_birth_certificate_number');
            $table->enum('child_gender', ['male', 'female']);

            // Ariza holati
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
