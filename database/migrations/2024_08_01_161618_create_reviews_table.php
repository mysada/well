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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                  ->constrained('products');
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->integer('rating');
            $table->text('review_text')->nullable();
            // Add indexes to the foreign key columns
            $table->index('product_id');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'flagged', 'pending'])->default(
              'active'
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
        Schema::dropIfExists('reviews');
    }

};
