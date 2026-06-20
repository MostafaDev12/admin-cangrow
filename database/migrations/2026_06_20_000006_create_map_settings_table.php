<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('map_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_key')->unique();          // contact_page, homepage
            $table->tinyInteger('enabled')->default(1);
            $table->text('embed_url')->nullable();
            $table->string('clinic_name')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_fr')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('map_title')->nullable();
            $table->text('direct_link')->nullable();
            $table->string('button_text_ar')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_text_fr')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('map_settings');
    }
};
