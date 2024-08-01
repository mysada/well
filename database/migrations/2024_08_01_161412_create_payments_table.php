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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('orderid')->unsigned()->nullable();
            $table->enum('paymentmethod', ['Credit Card', 'PayPal', 'Other']);
            $table->dateTime('paymentdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('amount', 10, 2);
            $table->decimal('tax', 5, 2)->nullable();
            $table->decimal('gst', 5, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->enum('paymentstatus', ['Pending', 'Completed', 'Failed']);
            $table->bigInteger('transactionid')->unsigned()->nullable();

            // Define the foreign keys
            $table->foreign('orderid')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('transactionid')->references('id')->on('transactions')->onDelete('set null');

            // Add indexes to the foreign key columns
            $table->index('orderid');
            $table->index('transactionid');

            $table->timestamps();
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
