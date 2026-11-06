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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->foreignId ('Grade_id')->constrained ('grades', 'id')->cascadeOnDelete ();
            $table->foreignId ('Classroom_id')->constrained ('classrooms', 'id')->cascadeOnDelete ();
            $table->foreignId ('Teacher_id')->constrained ('teachers', 'id')->cascadeOnDelete ();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
