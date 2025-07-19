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
            $table->id(); // id (Primary Key)
            $table->foreignId('order_id')->constrained('orders'); // order_id (Foreign Key → orders)
            $table->foreignId('product_id')->constrained('products'); // product_id (Foreign Key → products)
            $table->integer('quantity'); // quantity (Integer)
            $table->decimal('price', 10, 2); // price (Decimal: 10,2)
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
