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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(true);
            $table->longText('description')->nullable(true);
            $table->string('sound')->nullable(true);
            $table->string('category');
            $table->integer('like_count')->default(0);
            $table->integer('unlike_count')->default(0);
            $table->string('comment')->nullable(true);
            $table->integer('view_count')->default(0);
            $table->string('status')->default('free');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
