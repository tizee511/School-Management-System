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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId ('quizze_id')->constrained ('quizzes', 'id')->cascadeOnDelete();
            $table->foreignId ('student_id')->constrained ('students', 'id')->cascadeOnDelete();
            $table->foreignId ('question_id')->constrained('questions', 'id')->cascadeOnDelete();
            $table->float ('score');
            $table->enum ('abuse', ['0', '1'])->default (0);
            $table->date ('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degrees');
    }
};
