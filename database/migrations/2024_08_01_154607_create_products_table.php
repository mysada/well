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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->bigInteger('category_id')->unsigned();
            $table->integer('stock');
            $table->string('image_url', 255)->nullable();
            $table->string('color', 50)->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

};
