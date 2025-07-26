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
        Schema::create('subcategory_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')
                ->constrained('news')
                ->onDelete('cascade');
            $table->foreignId('subcategory_id')
                ->constrained('subcategories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategory_news');
    }
};
