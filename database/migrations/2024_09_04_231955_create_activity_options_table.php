<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_text');
            $table->boolean('is_correct');
            $table->foreignId('activity_question_id')->constrained('activity_questions');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_options');
    }
};
