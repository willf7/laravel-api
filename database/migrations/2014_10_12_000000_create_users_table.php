<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name');
            $table->string('password')->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->string('cpf')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->enum('role', ['student', 'teacher', 'admin']);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
