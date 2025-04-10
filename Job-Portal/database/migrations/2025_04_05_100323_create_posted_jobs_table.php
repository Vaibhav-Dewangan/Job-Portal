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
        Schema::create('posted_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('location');
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->string('contract_length')->nullable();
            $table->string('experience')->nullable();
            $table->string('job_type');
            $table->json('schedule')->nullable();
            $table->text('description');
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('industry_sector');
            $table->text('skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posted_jobs');
    }
};
