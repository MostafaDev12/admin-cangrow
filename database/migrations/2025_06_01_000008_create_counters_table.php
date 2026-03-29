<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('counters')) {
            Schema::create('counters', function (Blueprint $table) {
                $table->id();
                $table->string('type')->nullable();
                $table->string('referral')->nullable();
                $table->unsignedBigInteger('total_count')->default(0);
                $table->unsignedBigInteger('todays_count')->default(0);
                $table->date('today')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
