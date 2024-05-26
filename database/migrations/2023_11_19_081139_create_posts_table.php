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
            $table->string('title')->nullable()->default('');
            $table->longText('content')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('meta_link')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('type', ['homepage_banner', 'testimonial', 'content', 'news',  'services', 'team', 'pages', 'about', 'faq', 'gallery', 'bod', 'csr', 'clients', 'facilities'])->nullable();
            $table->string('slug');
            $table->boolean('is_top_news')->default(false);
            $table->boolean('is_featured_post')->default(false);
            $table->boolean('is_top_rated')->default(false);
            $table->boolean('is_breaking_news')->default(false);
            $table->boolean('is_trending_news')->default(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
