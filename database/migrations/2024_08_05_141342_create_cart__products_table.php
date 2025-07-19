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
    {Schema::disableForeignKeyConstraints();
        Schema::create('cart__products', function (Blueprint $table) {
            $table->id();
            $table->integer('total_price');
            $table->integer('total_quantity')->default(1);
            $table->integer('discount')->default(0);
            $table->foreignId('cart_id')->constrained('carts');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
        });Schema::enableForeignKeyConstraints();
    }
  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart__products');
    }
};
