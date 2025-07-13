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
        Schema::create('library', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student');
            // other ways to add foreigh key =========================
            // $table->foreignId('student_id')->constrained();
            // $table->foreignId('stu_id')->constrained('student');
            // $table->dropunique('email')
            // $table->dropprimary('id')
            // $table->dropforeigh(['user_id'])

            // to update a table
            // php artisan migrate:create_update_library_table --table=library
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library');
    }
};
