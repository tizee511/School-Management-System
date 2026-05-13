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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId ('Student_id')->references ('id')->on ('students')->onDelete ('cascade');
            $table->foreignId ('Grade_id')->references ('id')->on ('grades')->onDelete ('cascade');
            $table->foreignId ('Classroom_id')->references ('id')->on ('Classrooms')->onDelete ('cascade');
            $table->decimal ('Debit', 8, 2)->nullable();
            $table->decimal ('Credit', 8, 2)->nullable();
            $table->string ('description')->nullable ();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
};
