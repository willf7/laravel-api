<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('topic');
            $table->text('description');
            $table->string('difficulty');
            $table->date('due_date');
            $table->text('file');
            $table->integer('status')->default(1);
            $table->foreignId('subject_id')->constrained('subjects');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
