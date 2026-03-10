<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->decimal('discount_value', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['upcoming', 'active', 'expired'])->default('upcoming');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
