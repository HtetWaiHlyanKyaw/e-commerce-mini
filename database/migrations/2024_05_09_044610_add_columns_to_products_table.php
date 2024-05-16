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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('display')->nullable();
            $table->string('camera')->nullable();
            $table->string('resolution')->nullable();
            $table->string('os')->nullable();
            $table->string('chipset')->nullable();
            $table->string('main_camera')->nullable();
            $table->string('selfie_camera')->nullable();
            $table->string('battery')->nullable();
            $table->string('charging')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
