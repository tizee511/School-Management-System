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
        Schema::create('fees_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('Invoice_date');
            $table->foreignId ('Student_id')->references ('id')->on ('students')->onDelete ('cascade');
            $table->foreignId ('Grade_id')->references ('id')->on ('grades')->onDelete ('cascade');
            $table->foreignId ('Classroom_id')->references ('id')->on ('Classrooms')->onDelete ('cascade');
            $table->foreignId ('Fee_id')->references('id')->on ('fees')->onDelete ('cascade');
            $table->decimal ('amount', 8, 2);
            $table->string ('description')->nullable ();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_invoices');
    }
};
