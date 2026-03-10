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
        Schema::table('order_items', function (Blueprint $table) {
            DB::statement("alter table order_items modify order_status enum(
                'pending',
                'processing',
                'assigned',
                'out_of_delivery',
                'shipped',
                'delivered',
                'cancelled'
            )");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            DB::statement("alter table order_items modify order_status enum(
                'pending',
                'processing',
                'out_of_delivery',
                'shipped',
                'delivered',
                'cancelled'
            )");
        });
    }
};
