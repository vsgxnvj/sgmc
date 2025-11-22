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
        Schema::create('cashin_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // account requesting cashin
            $table->string('username');
            $table->string('site');
            $table->decimal('amount', 10, 2);
            $table->string('receipt_img')->nullable();
            $table->tinyInteger('isprocess')->default(0); // 0=pending,1=approved,2=rejected
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashin_requests');
    }
};
