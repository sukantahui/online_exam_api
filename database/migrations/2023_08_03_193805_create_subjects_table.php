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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 50)->nullable(false);
            $table->string('subject_details', 50)->nullable(true);
            $table->foreignId('subject_group_id')->references('id')->on('subject_groups')->onDelete('cascade');
            $table->unique(["subject_name", "subject_group_id"], 'subject_subject_group_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
