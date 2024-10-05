<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text');
            $table->string('question_type');
            $table->foreignId('activity_id')->constrained('activities');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_questions');
    }
};
