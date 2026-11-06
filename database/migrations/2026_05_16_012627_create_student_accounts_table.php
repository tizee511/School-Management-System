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
            $table->string('type')->nullable();
            $table->foreignId ('fee_invoice_id')->nullable ()->constrained ('fees_invoices', 'id')->cascadeOnDelete ();
            $table->foreignId ('Receipt_id')->nullable ()->constrained ('receipt_students', 'id')->cascadeOnDelete ();
            $table->foreignId ('processing_fee_id')->nullable ()->constrained ('processing_fees', 'id')->cascadeOnDelete ();
            $table->foreignId ('Payment_id')->nullable ()->constrained ('payment_students', 'id')->cascadeOnDelete ();
            $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
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
