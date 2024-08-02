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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                  ->constrained('orders');
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->decimal('amount', 10, 2);
            $table->enum('transaction_type', ['Payment', 'Refund', 'Chargeback']
            )->default('Payment');
            $table->string('currency', 10)->default('USD');
            $table->enum('status', ['Pending', 'Completed', 'Failed'])
                  ->default('Pending');
            $table->text('response')->nullable();

            $table->timestamps(); // 保留时间戳
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
