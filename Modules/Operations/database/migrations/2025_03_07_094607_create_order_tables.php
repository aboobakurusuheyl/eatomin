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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_profile_id')->constrained('profiles')->cascadeOnDelete();
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('delivery_profile_id')->constrained('profiles')->cascadeOnDelete();
            $table->enum('order_status', ['pending', 'preparing', 'in-transit', 'delivered']);
            $table->float('total_price');
            $table->integer('total_calories');
            $table->string('delivery_address');
            $table->float('latitude');
            $table->float('longitude');
            $table->text('dietary_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('menu_item_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity');
            $table->json('customizations');
            $table->text('description')->nullable();
            $table->float('price');
            $table->integer('calories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
