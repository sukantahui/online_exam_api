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
        Schema::create('user_to_organisations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('organisation_id')->unsigned(true);
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
            $table->unique(["user_id", "organisation_id"], 'user_organisation_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_to_organisations');
    }
};
