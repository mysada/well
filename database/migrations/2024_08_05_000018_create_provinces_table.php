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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('country_code',10);
            $table->string('name',255);
            $table->string('short_name',255);
            $table->decimal('gst_rate',4,2);
            $table->decimal('pst_rate',4,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }

};
