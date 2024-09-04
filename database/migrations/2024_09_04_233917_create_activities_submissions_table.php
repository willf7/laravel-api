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
        Schema::create('activities_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId');
            $table->foreign('studentId')->references('id')->on('users');
            $table->unsignedBigInteger('activityId');
            $table->foreign('activityId')->references('id')->on('activities');
            $table->date('submissionDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_submissions');
    }
};
