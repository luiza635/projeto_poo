<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // 🔥 SEM FOREIGN KEY (evita erro 150 MySQL)
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('body');
            $table->string('image_url')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('draft');

            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('comments_count')->default(0);

            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
Schema::create('articles', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('category_id')->nullable();
    $table->unsignedBigInteger('user_id')->nullable();

    $table->string('title');
    $table->longText('body');

    $table->timestamps();
});