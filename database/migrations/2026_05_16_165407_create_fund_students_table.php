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
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('Receipt_id')->nullable()->references('id')->on('receipt_students')->cascadeOnDelete();
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->cascadeOnDelete();
            $table->decimal('Debit',8,2)->nullable();
            $table->decimal('Credit',8,2)->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_accounts');
    }
};
