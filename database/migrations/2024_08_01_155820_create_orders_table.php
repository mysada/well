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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users');
            $table->integer('quantity')->nullable();
            $table->decimal('pre_tax_amount', 10, 2)->nullable();
            $table->decimal('post_tax_amount', 10, 2)->nullable();
            $table->decimal('gst', 10, 2)->nullable();
            $table->decimal('pst', 10, 2)->nullable();
            $table->decimal('shipping_rate', 10, 2)->nullable();
            $table->string('shipping_name', 255)->nullable();
            $table->string('shipping_email', 255)->nullable();
            $table->string('shipping_phone', 255)->nullable();
            $table->string('shipping_address', 255)->nullable();
            $table->string('shipping_city', 100)->nullable();
            $table->string('shipping_province', 100)->nullable();
            $table->string('shipping_country', 100)->nullable();
            $table->string('shipping_postal_code', 10)->nullable();
            $table->string('coupon_code', 20)->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum(
                'status',
                ['Pending', 'CONFIRMED', 'Shipped', 'Delivered', 'Cancelled']
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
        Schema::dropIfExists('orders');
    }

};
