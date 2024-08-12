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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('last_order_id')->nullable();
            $table->unsignedBigInteger('previous_order_id')->nullable();

            // Add foreign key constraints
            $table->foreign('last_order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('previous_order_id')->references('id')->on('orders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['last_order_id']);
            $table->dropForeign(['previous_order_id']);
            $table->dropColumn(['last_order_id', 'previous_order_id']);
        });
    }
};
