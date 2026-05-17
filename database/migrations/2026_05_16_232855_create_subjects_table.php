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
            $table->foreignId ('Grade_id')->references ('id')->on ('grades')->cascadeOnDelete ();
            $table->foreignId ('Classroom_id')->references ('id')->on ('classrooms')->cascadeOnDelete ();
            $table->foreignId ('Teacher_id')->references ('id')->on ('teachers')->cascadeOnDelete ();
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
