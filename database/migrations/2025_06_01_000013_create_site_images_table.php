<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('site_images')) {
            Schema::create('site_images', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->string('path')->nullable();
                $table->string('section');
                $table->string('label');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('site_images');
    }
};
