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
        Schema::create('articals', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('writer');
            $table->enum('writer_type' , ["admin" , "moderator"]);
            $table->longText('content');
            $table->foreignId('blog_id')->constrained('blogs')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->json('tags')->nullable();
            $table->enum('status' , ['active' , 'archive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articals');
    }
};
