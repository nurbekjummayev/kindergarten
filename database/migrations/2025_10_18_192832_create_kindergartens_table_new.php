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
        Schema::create('kindergartens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('logo')->nullable();
            $table->json('galleries');

            $table->integer('capacity');
            $table->integer('age_start');
            $table->integer('age_end');

            $table->double('latitude');
            $table->double('longitude');

            $table->string('website')->nullable();

            $table->decimal('monthly_fee_start', 10, 2);
            $table->decimal('monthly_fee_end', 10, 2);

            $table->string('status')->default('draft');
            $table->text('rejection_reason')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kindergartens');
    }
};
