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
        Schema::create('customer_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id', 255);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name', 255);
            $table->string('payment_method', 100);
            $table->decimal('total_price', 10, 2);
            $table->integer('total_quantity');
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->string('town', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_purchases');
    }
};
