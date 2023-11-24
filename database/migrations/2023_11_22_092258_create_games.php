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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover');
            $table->string('youtube');
            $table->foreignId('plateform_id')->constrained();
            $table->string('synopsis');
            $table->string('editor')->nullable();
            $table->string('developer')->nullable();
            $table->string('gender')->nullable();
            $table->string('rating')->nullable();
            $table->string('mode')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
