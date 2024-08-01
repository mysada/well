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
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('cartid')->unsigned()->nullable();
            $table->bigInteger('productid')->unsigned()->nullable();
            $table->integer('quantity')->nullable(false);

            // Define the foreign keys
            $table->foreign('cartid')->references('id')->on('shoppingcart')->onDelete('set null');
            $table->foreign('productid')->references('id')->on('products')->onDelete('set null');

            // Add indexes to the foreign key columns
            $table->index('cartid');
            $table->index('productid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartitems');
    }
};
