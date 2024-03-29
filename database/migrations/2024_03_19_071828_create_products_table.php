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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_model_id')->constrained()->onDelete('cascade');
            $table->string('storage_option', 50);
            $table->string('color', 50);
            $table->decimal('price', 10, 2);
            $table->bigInteger('quantity');
            $table->integer('low_stock');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
