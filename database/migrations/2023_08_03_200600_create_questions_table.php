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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_description')->nullable(false);
            $table->foreignId('chapter_id')->references('id')->on('chapters')->ondelete('cascade');
            $table->foreignId('question_type_id')->references('id')->on('question_types')->ondelete('cascade');
            $table->foreignId('question_level_id')->references('id')->on('question_levels')->ondelete('cascade');
            $table->foreignId('question_content_type_id')->references('id')->on('question_content_types')->ondelete('cascade');
            $table->foreignId('question_zone_id')->default(1)->references('id')->on('question_zones')->ondelete('cascade');
            $table->string('image_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
