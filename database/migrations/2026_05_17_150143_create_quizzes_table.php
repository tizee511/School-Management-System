<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->foreignId ('Subject_id')->references ('id')->on ('subjects')->cascadeOnDelete ();
            $table->foreignId ('Grade_id')->references ('id')->on ('grades')->cascadeOnDelete ();
            $table->foreignId ('Classroom_id')->references ('id')->on ('classrooms')->cascadeOnDelete ();
            $table->foreignId ('Section_id')->references ('id')->on ('sections')->cascadeOnDelete ();
            $table->foreignId ('Teacher_id')->references ('id')->on ('teachers')->cascadeOnDelete ();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
