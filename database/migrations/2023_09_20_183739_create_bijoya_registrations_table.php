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
        Schema::create('bijoya_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->nullable(false);
            $table->string('contact_number')->nullable(false)->unique();
            $table->string('whatsapp_number')->nullable(false)->unique();
            $table->string('email_id')->unique()->nullable(false);
            $table->tinyInteger('number_of_member');
            $table->string('food_habit')->nullable(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bijoya_registrations');
    }
};
