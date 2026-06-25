<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_tourism_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');                 // benefit | journey | support | faq
            $table->string('icon')->nullable();     // emoji or fontawesome class
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('display_order')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();

            $table->index(['type', 'active', 'display_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_tourism_blocks');
    }
};
