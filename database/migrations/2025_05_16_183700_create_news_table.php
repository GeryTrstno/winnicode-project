<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('status');
            $table->string('caption')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('comment')->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('comments_count')->default(0);

            // $table->boolean('is_published')->default(false);
            // $table->timestamp('published_at')->nullable();

            // $table->unsignedBigInteger('views')->default(0);
            // $table->unsignedBigInteger('likes')->default(0);
            // $table->unsignedBigInteger('dislikes')->default(0);

            // $table->string('tags')->nullable(); // Comma-separated tags
            // $table->string('language')->default('en'); // Default language is English
            // $table->string('status')->default('draft'); // Possible values: draft, published, archived
            // $table->string('seo_title')->nullable();
            // $table->string('seo_description')->nullable();
            // $table->string('seo_keywords')->nullable();
            // $table->string('seo_image')->nullable();
            // $table->string('source_url')->nullable(); // URL of the original source if applicable
            // $table->string('source_name')->nullable(); // Name of the source if applicable
            // $table->string('source_logo')->nullable(); // Logo of the source if applicable
            // $table->string('source_type')->nullable(); // Type of the source (e.g., blog, news, social media)
            // $table->string('source_author')->nullable(); // Author of the source content
            // $table->string('source_date')->nullable(); // Date of the source content
            // $table->string('source_language')->default('en'); // Language of the source content
            // $table->string('source_status')->default('draft'); // Status of the source content
            // $table->string('source_slug')->nullable(); // Slug for the source content
            // $table->string('source_category')->nullable(); // Category of the source content
            // $table->string('source_tags')->nullable(); // Comma-separated tags for the source content
            // $table->string('source_seo_title')->nullable(); // SEO title for the source content
            // $table->string('source_seo_description')->nullable(); // SEO description for the source content
            // $table->string('source_seo_keywords')->nullable(); // SEO keywords for the source content
            // $table->string('source_seo_image')->nullable(); // SEO image for the source content
            // $table->string('source_source_url')->nullable(); // URL of the original source content
            // $table->string('source_source_name')->nullable(); // Name of the original source content
            // $table->string('source_source_logo')->nullable(); // Logo of the original source content
            // $table->string('source_source_type')->nullable(); // Type of the original source content
            // $table->string('source_source_author')->nullable(); // Author of the original source content
            // $table->string('source_source_date')->nullable(); // Date of the original source content
            // $table->string('source_source_language')->default('en'); // Language of the original source content
            // $table->string('source_source_status')->default('draft'); // Status of the original source content
            // $table->string('source_source_slug')->nullable(); // Slug for the original source content
            // $table->string('source_source_category')->nullable(); // Category of the original source content
            // $table->string('source_source_tags')->nullable(); // Comma-separated tags for the original source content
            // $table->string('source_source_seo_title')->nullable(); // SEO title for the original source content
            // $table->string('source_source_seo_description')->nullable(); // SEO description for the original source content
            // $table->string('source_source_seo_keywords')->nullable(); // SEO keywords for the original source content
            // $table->string('source_source_seo_image')->nullable(); // SEO image for the original source content
            // $table->string('source_source_source_url')->nullable(); // URL of the original source content
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
