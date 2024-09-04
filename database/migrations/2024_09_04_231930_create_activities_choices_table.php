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
        Schema::create('activities_choices', function (Blueprint $table) {
            $table->id();
            $table->string('optionText');
            $table->boolean('isCorrect');
            $table->unsignedBigInteger('questionId');
            $table->foreign('questionId')->references('id')->on('activities_questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_choices');
    }
};
