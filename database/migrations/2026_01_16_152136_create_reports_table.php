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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('type');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('frequency')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->enum('status', ['pending', 'processing', 'resolved'])->default('pending');
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->string('document_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
