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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->enum('method', ['Credit Card', 'PayPal', 'Other']);
            $table->decimal('amount', 10, 2);
            $table->decimal('tax', 5, 2)->nullable();
            $table->decimal('gst', 5, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->enum('status', ['Pending', 'Completed', 'Failed']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }

};
