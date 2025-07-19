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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('discrtion');
            $table->string('qualty');
            $table->string('price');
            $table->enum('Featured', [1, 0])->default(1);
            $table->integer('status')->default(1);
            $table->integer('view')->default(0);
            $table->foreignId('catgory_id')->constrained('catgories');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes('deleted_at', precision: 0);
            $table->timestamps();
        });Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
