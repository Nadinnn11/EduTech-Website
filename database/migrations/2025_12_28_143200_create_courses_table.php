<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->foreignId('created_by')
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_student');
        Schema::dropIfExists('courses');
    }
};
