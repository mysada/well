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

            $table->bigInteger('productid')->unsigned()->nullable();
            $table->bigInteger('userid')->unsigned()->nullable();
            $table->dateTime('orderdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('totalamount', 10, 2);
            $table->string('shippingaddress', 255)->nullable();
            $table->enum('status', ['Pending', 'Shipped', 'Delivered', 'Cancelled']);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');

            // Define the foreign keys
            $table->foreign('productid')->references('id')->on('products')->onDelete('set null');
            $table->foreign('userid')->references('id')->on('users')->onDelete('set null');

            // Add indexes to the foreign key columns
            $table->index('productid');
            $table->index('userid');

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
