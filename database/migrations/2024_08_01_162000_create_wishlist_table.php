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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userid')->unsigned()->nullable();
            $table->dateTime('createddate')->default(
              DB::raw('CURRENT_TIMESTAMP')
            );

            // Define the foreign key
            $table->foreign('userid')->references('id')->on('users')->onDelete(
              'set null'
            );

            // Add an index to the userid column
            $table->index('userid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }

};
