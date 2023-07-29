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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();

            $table->string('vendor_name', 255)->nullable(false)->unique(true);
            $table->string('mailing_name', 255)->nullable(true)->unique(false);
            $table->string('phone_number', 255)->nullable(false);
            $table->string('email', 255)->nullable(true);
            $table->string('address', 255)->nullable(false);
            $table->foreignId('district_id')->references('id')->on('districts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
