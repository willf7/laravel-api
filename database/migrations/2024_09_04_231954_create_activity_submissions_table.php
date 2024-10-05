<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('activity_id')->constrained('activities');
            $table->date('submission_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_submissions');
    }
};
