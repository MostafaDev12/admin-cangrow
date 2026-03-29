<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('email_templates')) {
            Schema::create('email_templates', function (Blueprint $table) {
                $table->id();
                $table->string('email_type')->nullable();
                $table->string('email_subject')->nullable();
                $table->longText('email_body')->nullable();
                $table->tinyInteger('status')->default(1);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
