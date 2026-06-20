<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->tinyInteger('video_enabled')->default(0)->after('tags');
            $table->string('youtube_video_url')->nullable()->after('video_enabled');
            $table->string('video_badge_ar')->nullable();
            $table->string('video_badge_en')->nullable();
            $table->string('video_badge_fr')->nullable();
            $table->string('video_heading_ar')->nullable();
            $table->string('video_heading_en')->nullable();
            $table->string('video_heading_fr')->nullable();
            $table->text('video_description_ar')->nullable();
            $table->text('video_description_en')->nullable();
            $table->text('video_description_fr')->nullable();
            $table->string('video_button_text_ar')->nullable();
            $table->string('video_button_text_en')->nullable();
            $table->string('video_button_text_fr')->nullable();
            $table->string('video_button_link')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_title')->nullable();
            $table->integer('video_order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'video_enabled', 'youtube_video_url',
                'video_badge_ar', 'video_badge_en', 'video_badge_fr',
                'video_heading_ar', 'video_heading_en', 'video_heading_fr',
                'video_description_ar', 'video_description_en', 'video_description_fr',
                'video_button_text_ar', 'video_button_text_en', 'video_button_text_fr',
                'video_button_link', 'video_thumbnail', 'video_title', 'video_order',
            ]);
        });
    }
};
