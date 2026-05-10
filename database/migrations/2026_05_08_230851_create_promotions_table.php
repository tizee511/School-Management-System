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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Student_id')->constrained('students','id')->cascadeOnDelete();
            $table->foreignId('From_Grade')->constrained('grades','id')->cascadeOnDelete();
            $table->foreignId('To_Grade')->constrained('grades','id')->cascadeOnDelete();
            $table->foreignId('From_Classroom')->constrained('Classrooms','id')->cascadeOnDelete();
            $table->foreignId('To_Classroom')->constrained('Classrooms','id')->cascadeOnDelete();
            $table->foreignId('From_Section')->constrained('sections','id')->cascadeOnDelete();
            $table->foreignId('To_Section')->constrained('sections','id')->cascadeOnDelete();
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
