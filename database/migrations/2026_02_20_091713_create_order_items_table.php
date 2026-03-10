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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('customer_id')->references('id')->on('users');
            $table->foreignId('vendor_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total_amount');
            $table->enum('payment_mode',['cod','upi'])->default('cod');
            $table->enum('payment_status',['pending','paid','failed'])->default('pending');
            $table->enum('order_status',['pending','processing','out_of_delivery','shipped','delivered','cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
