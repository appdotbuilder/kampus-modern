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
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('code')->unique();
            $table->enum('level', ['D3', 'S1', 'S2', 'S3']);
            $table->text('description')->nullable();
            $table->string('accreditation')->nullable();
            $table->integer('duration_semesters')->default(8);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['faculty_id', 'name']);
            $table->index('code');
            $table->index('level');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};