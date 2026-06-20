<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id')->index();
            $table->string('name');                       // field key: name, phone, city, email, message, country...
            $table->string('type')->default('text');      // text, email, tel, textarea, date, select
            $table->string('label_ar')->nullable();
            $table->string('label_en')->nullable();
            $table->string('label_fr')->nullable();
            $table->string('placeholder_ar')->nullable();
            $table->string('placeholder_en')->nullable();
            $table->string('placeholder_fr')->nullable();
            $table->text('options')->nullable();          // JSON for select options
            $table->tinyInteger('visible')->default(1);
            $table->tinyInteger('required')->default(0);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
