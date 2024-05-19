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
        Schema::create('employment_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('application_code')->unique();
            $table->string('job_code');
            $table->string('phone');
            $table->string('email');
            $table->string('attachments')->nullable();
            $table->string('verify_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_models');
    }
};
