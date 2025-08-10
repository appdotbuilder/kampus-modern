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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('position')->nullable();
            $table->string('education_level')->nullable();
            $table->string('expertise')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            $table->index('nip');
            $table->index('name');
            $table->index('email');
            $table->index(['faculty_id', 'status']);
            $table->index('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};