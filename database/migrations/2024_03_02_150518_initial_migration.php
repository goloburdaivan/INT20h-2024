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
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3);
            $table->string('title');
        });

        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6);
            $table->unsignedInteger('course');
            $table->enum('study_form', ['Денна', 'Заочна']);
            $table->unsignedBigInteger('specialty_id');
            $table->foreign('specialty_id')->on('specialties')->references('id');
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id')->on('faculties')->references('id');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('password');
            $table->string('last_name')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->on('groups')->references('id')->onDelete('set null');
            $table->string('attestat')->unique();
            $table->string('pass_num')->unique();
            $table->enum('status', ['Контракт', 'Бюджет']);
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id');
        });

        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('info');
            $table->enum('type', ['exam', 'credit']);
        });

        Schema::create('student_discipline', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('discipline_id');
            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('discipline_id')->on('disciplines')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
