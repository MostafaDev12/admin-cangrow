<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (! Schema::hasColumn('services', 'mt_featured')) {
                $table->tinyInteger('mt_featured')->default(0);
            }
            if (! Schema::hasColumn('services', 'mt_order')) {
                $table->integer('mt_order')->default(0);
            }
        });

        Schema::table('before_afters', function (Blueprint $table) {
            if (! Schema::hasColumn('before_afters', 'mt_featured')) {
                $table->tinyInteger('mt_featured')->default(0);
            }
        });

        Schema::table('testimonials', function (Blueprint $table) {
            if (! Schema::hasColumn('testimonials', 'mt_featured')) {
                $table->tinyInteger('mt_featured')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['mt_featured', 'mt_order']);
        });
        Schema::table('before_afters', function (Blueprint $table) {
            $table->dropColumn('mt_featured');
        });
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('mt_featured');
        });
    }
};
