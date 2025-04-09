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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company_address')->nullable();
            $table->string('name');
            $table->string('industry_sector');
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('user_type');
            $table->string('company_website')->nullable();
            $table->string('about')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('employer_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('employer_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('employer_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_sessions');
        Schema::dropIfExists('employer_password_reset_tokens');
        Schema::dropIfExists('employers');
    }
};
