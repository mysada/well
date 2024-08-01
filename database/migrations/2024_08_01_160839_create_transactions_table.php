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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('orderid')->unsigned()->nullable();
            $table->string('transaction_id', 255);
            $table->string('transactionstatus', 255)->nullable();
            $table->text('transactionresponse')->nullable();
            $table->tinyInteger('softdelete')->default(0);
            $table->dateTime('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Define the foreign key
            $table->foreign('orderid')->references('id')->on('orders')->onDelete('set null');

            // Add an index to the orderid column
            $table->index('orderid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
