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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->json('tags')->nullable();
            $table->integer('writer');
            $table->unsignedBigInteger('views');
            $table->enum('writer_type' , ["admin" , "moderator"]);
            $table->foreignId('news_category_id')->constrained('news_categories')->cascadeOnDelete();
            $table->enum('status' , ['active' , 'archive']);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
