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
        Schema::create('subject_groups', function (Blueprint $table) {
            $table->id();
            $table->string('subject_group_name', 50)->nullable(false);
            $table->foreignId('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
            $table->unique(["subject_group_name", "organisation_id"], 'subject_organisation_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_groups');
    }
};
