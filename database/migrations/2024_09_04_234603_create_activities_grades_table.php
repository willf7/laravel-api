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
        Schema::create('activities_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submissionId');
            $table->foreign('submissionId')->references('id')->on('activities_submissions');
            $table->unsignedBigInteger('teacherId');
            $table->foreign('teacherId')->references('id')->on('users');
            $table->decimal('grade');
            $table->text('feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_grades');
    }
};
