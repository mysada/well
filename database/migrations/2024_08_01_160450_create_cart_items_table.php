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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users');
            $table->foreignId('product_id')
                  ->constrained('products');
            $table->integer('quantity')->default(0);
            $table->integer('items')->default(
              0
            );  // Define items as an integer field

            $table->decimal('subtotal', 8, 2)->default(0);
            $table->decimal('total', 8, 2)->default(0);

            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }

};
