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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 255)->nullable(false);
            $table->string('last_name', 255)->nullable(false);
            $table->foreignId('designation_id')->references('id')->on('designations');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->date('doj');
            $table->date('dob');
            $table->string('phone_number', 255);
            $table->string('email', 255);
            $table->integer('salary')->default(0);
            $table->string('city', 255)->nullable(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
