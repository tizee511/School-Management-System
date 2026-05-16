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
            $table->date('Invoice_date');
            $table->string('type');
            $table->foreignId ('fee_invoice_id')->nullable ()->references ('id')->on ('fees_invoices')->cascadeOnDelete();
            $table->foreignId('Receipt_id')->nullable()->references('id')->on('receipt_students')->cascadeOnDelete();
            $table->foreignId('processing_fee_id')->nullable()->references('id')->on('processing_fees')->cascadeOnDelete();
            $table->foreignId('Payment_id')->nullable()->references('id')->on('payment_students')->cascadeOnDelete();
            $table->foreignId ('Student_id')->references ('id')->on ('students')->cascadeOnDelete();
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
