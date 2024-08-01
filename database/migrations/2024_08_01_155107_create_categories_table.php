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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productid')->unsigned()->nullable();
            $table->string('categoryname', 255);

            // Define the foreign key
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');

            // Add an index to the productid column
            $table->index('productid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
