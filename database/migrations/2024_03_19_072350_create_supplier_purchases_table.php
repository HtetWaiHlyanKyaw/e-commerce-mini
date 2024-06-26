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
        Schema::create('supplier_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id', 255);
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->string('payment_method', 100);
            $table->decimal('total_price', 10, 2);
            $table->integer('total_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_purchases');
    }
};
