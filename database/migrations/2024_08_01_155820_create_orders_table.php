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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->string('recipient_name', 255)->nullable();
            $table->string('shipping_address', 255)->nullable();
            $table->string('shipping_city', 100)->nullable();
            $table->string('shipping_province', 100)->nullable();
            $table->string('shipping_postal_code', 10)->nullable();
            $table->enum(
              'status',
              ['Pending', 'Shipped', 'Delivered', 'Cancelled']
            );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }

};
