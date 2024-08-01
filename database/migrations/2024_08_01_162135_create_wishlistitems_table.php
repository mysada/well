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
        Schema::create('wishlistitems', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('wishlistid')->unsigned()->nullable();
            $table->bigInteger('productid')->unsigned()->nullable();

            // Define the foreign keys
            $table->foreign('wishlistid')->references('id')->on('wishlist')->onDelete('set null');
            $table->foreign('productid')->references('id')->on('products')->onDelete('set null');

            // Add indexes to the foreign key columns
            $table->index('wishlistid');
            $table->index('productid');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlistitems');
    }
};
