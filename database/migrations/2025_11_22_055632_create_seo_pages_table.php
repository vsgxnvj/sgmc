<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_pages', function (Blueprint $table) {
          $table->id();

        // Basic SEO
        $table->string('title');
        $table->string('meta_description')->nullable();
        $table->string('slug')->unique();
        $table->string('focus_keywords')->nullable();
        $table->string('secondary_keywords')->nullable();

        // OG Tags
        $table->string('og_title')->nullable();
        $table->string('og_description')->nullable();
        $table->string('og_image')->nullable();

        // Twitter Tags
        $table->string('twitter_title')->nullable();
        $table->string('twitter_description')->nullable();
        $table->string('twitter_image')->nullable();

        // Content
        $table->string('h1')->nullable();
        $table->longText('full_description')->nullable();

        // FAQ Schema
        $table->longText('faq_schema')->nullable();

        // JSON-LD Schema
        $table->longText('json_ld')->nullable();

        // Gallery (images)
        $table->json('gallery')->nullable();

        // Video URL or File
        $table->string('video')->nullable();

        // ALT text for gallery
        $table->json('alt_texts')->nullable();

        // Your NEW custom fields
        $table->string('registration_type')->nullable(); // agent or self
        $table->string('cashin_method')->nullable();
        $table->string('cashout_method')->nullable();

        $table->string('link')->nullable();
        $table->string('category')->nullable();
        $table->string('plasada')->nullable();
        $table->string('agent_contact_link')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
    }
};
