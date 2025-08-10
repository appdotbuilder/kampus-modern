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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->foreignId('study_program_id')->constrained()->onDelete('cascade');
            $table->year('entry_year');
            $table->enum('status', ['active', 'inactive', 'graduated', 'dropped'])->default('active');
            $table->timestamps();
            
            $table->index('student_id');
            $table->index('name');
            $table->index('email');
            $table->index(['study_program_id', 'status']);
            $table->index('entry_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};