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
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->boolean('integration');
            $table->foreignId ('Grade_id')->references ('id')->on ('grades')->cascadeOnDelete ();
            $table->foreignId ('Classroom_id')->references ('id')->on ('classrooms')->cascadeOnDelete ();
            $table->foreignId ('Section_id')->references ('id')->on ('sections')->cascadeOnDelete ();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('meeting_id');
            $table->string('topic');
            $table->dateTime('start_at');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting password');
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_classes');
    }
};
