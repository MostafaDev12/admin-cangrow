<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->text('review_ar')->nullable();
            $table->text('review_en')->nullable();
            $table->text('review_fr')->nullable();
            $table->tinyInteger('rating')->default(5);
            $table->string('service_name')->nullable();    // treatment / service
            $table->string('location')->nullable();        // city or country
            $table->tinyInteger('active')->default(1);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
