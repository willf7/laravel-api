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
        Schema::create('activity_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('selected_option_id')->constrained('activity_options');
            $table->foreignId('activity_question_id')->constrained('activity_questions');
            $table->foreignId('activity_submission_id')->constrained('activity_submissions');
            $table->text('answer_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_answers');
    }
};
