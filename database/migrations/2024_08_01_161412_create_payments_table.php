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

            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->enum('method', ['Credit Card', 'PayPal', 'Other']);
            $table->decimal('amount', 10, 2);
            $table->decimal('discount', 5, 2)->nullable();
            $table->enum('status', ['Pending', 'Completed', 'Failed']);
            $table->string('payer_name', 255);
            $table->string('payer_card', 255);
            $table->string('billing_name', 255)->nullable();
            $table->string('billing_email', 255)->nullable();
            $table->string('billing_phone', 255)->nullable();
            $table->string('billing_address', 255)->nullable();
            $table->string('billing_city', 100)->nullable();
            $table->string('billing_province', 100)->nullable();
            $table->string('billing_country', 100)->nullable();
            $table->string('billing_postal_code', 10)->nullable();
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
