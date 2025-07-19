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
        Schema::create('orders', function (Blueprint $table) {
            table->id(); // id (Primary Key)
            $table->foreignId('user_id')->constrained('users'); // user_id (Foreign Key → users)
            $table->decimal('total_amount', 10, 2); // total_amount (Decimal: 10,2)
            $table->enum('status', ['pending', 'processing', 'shipped', 'cancelled']); // status (Enum)
            $table->enum('payment_status', ['paid', 'unpaid']); // payment_status (Enum)
            $table->text('shipping_address'); // shipping_address
            $table->softDeletes(); // عمود المسح الناعم (deleted_at)
            $table->timestamps(); // Created_at and Updated_a
        });Schema::enableForeignKeyConstraints();
    }
      //الحقول:

// id (Primary Key)

// user_id (Foreign Key → users)

// total_amount (Decimal: 10,2)

// status (Enum: pending, processing, shipped, cancelled)

// payment_status (Enum: paid, unpaid)

// shipping_address

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
