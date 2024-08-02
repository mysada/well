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
            $table->bigInteger('userid')->unsigned()->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('shipping_address', 255)->nullable();
            $table->enum(
              'status',
              ['Pending', 'Shipped', 'Delivered', 'Cancelled']
            );
            $table->decimal('price', 10, 2);
            $table->timestamps();
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
