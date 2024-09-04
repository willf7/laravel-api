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
        Schema::create('activities_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selectedOptionId');
            $table->foreign('selectedOptionId')->references('id')->on('activities_options');
            $table->unsignedBigInteger('questionId');
            $table->foreign('questionId')->references('id')->on('activities_questions');
            $table->unsignedBigInteger('submissionId');
            $table->foreign('submissionId')->references('id')->on('activities_submissions');
            $table->text('answerText');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_answers');
    }
};
