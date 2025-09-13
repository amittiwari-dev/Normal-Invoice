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
            Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no')->unique();
            $table->date('bill_date')->nullable();
            $table->string('order_no')->nullable();

            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');

            $table->string('messers')->nullable();   // Client name
            $table->string('address')->nullable();   // Client address

            $table->decimal('total_rs', 15, 2)->default(0);  // Total amount
            $table->string('total_in_words')->nullable();    // Amount in words

            $table->timestamps();
        });

        // Invoice Items Table
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');

            $table->integer('sn')->nullable();             // Serial number
            $table->text('particulars')->nullable();       // Work / Item details
            $table->integer('qty')->nullable();
            $table->decimal('rate', 15, 2)->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('paise')->nullable()->default("00");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoices');
    }
};
