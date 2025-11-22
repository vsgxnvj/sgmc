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
        Schema::create('organizations', function (Blueprint $table) {
               $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url');
            $table->json('same_as')->nullable(); // social links as JSON
            $table->string('telephone')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('area_served')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};