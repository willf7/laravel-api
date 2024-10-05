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
        Schema::create('activity_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_submission_id')->constrained('activity_submissions');
            $table->foreignId('teacher_id')->constrained('users');
            $table->decimal('grade');
            $table->text('feedbacks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_grades');
    }
};
