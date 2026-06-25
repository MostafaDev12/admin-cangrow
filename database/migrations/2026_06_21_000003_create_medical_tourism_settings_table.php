<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_tourism_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('enabled')->default(1);

            // Hero
            $table->string('hero_badge_ar')->nullable();
            $table->string('hero_badge_en')->nullable();
            $table->string('hero_heading_ar')->nullable();
            $table->string('hero_heading_en')->nullable();
            $table->string('hero_highlight_ar')->nullable();
            $table->string('hero_highlight_en')->nullable();
            $table->text('hero_description_ar')->nullable();
            $table->text('hero_description_en')->nullable();
            $table->string('hero_image')->nullable();

            // Section headings
            $table->string('benefits_heading_ar')->nullable();
            $table->string('benefits_heading_en')->nullable();
            $table->string('treatments_heading_ar')->nullable();
            $table->string('treatments_heading_en')->nullable();
            $table->string('treatments_subheading_ar')->nullable();
            $table->string('treatments_subheading_en')->nullable();
            $table->string('journey_heading_ar')->nullable();
            $table->string('journey_heading_en')->nullable();
            $table->text('journey_description_ar')->nullable();
            $table->text('journey_description_en')->nullable();
            $table->string('support_heading_ar')->nullable();
            $table->string('support_heading_en')->nullable();
            $table->text('support_description_ar')->nullable();
            $table->text('support_description_en')->nullable();
            $table->string('beforeafter_heading_ar')->nullable();
            $table->string('beforeafter_heading_en')->nullable();
            $table->string('testimonials_heading_ar')->nullable();
            $table->string('testimonials_heading_en')->nullable();
            $table->string('faq_heading_ar')->nullable();
            $table->string('faq_heading_en')->nullable();

            // Final CTA
            $table->string('final_cta_heading_ar')->nullable();
            $table->string('final_cta_heading_en')->nullable();
            $table->text('final_cta_description_ar')->nullable();
            $table->text('final_cta_description_en')->nullable();
            $table->string('final_cta_button_ar')->nullable();
            $table->string('final_cta_button_en')->nullable();
            $table->string('final_cta_image')->nullable();

            // SEO
            $table->string('meta_title_ar')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_tourism_settings');
    }
};
