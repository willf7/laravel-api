<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('description');
            $table->text('url')->nullable(false);
            $table->date('due_date');
            $table->integer('status')->default(1);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_lesson');
    }
};
