<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * * MANISH KUMAR
 * Class AddAddressesToUsersTable
 *
 * This migration adds billing_address and shipping_address columns to the users table.
 */
class AddAddressesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * This method adds the billing_address and shipping_address columns to the users table.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('billing_address')->nullable();
            $table->string('shipping_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     * This method removes the billing_address and shipping_address columns from the users table.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('billing_address');
            $table->dropColumn('shipping_address');
        });
    }
}
