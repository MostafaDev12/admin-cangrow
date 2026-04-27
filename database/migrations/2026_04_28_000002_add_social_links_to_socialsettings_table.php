<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('socialsettings', function (Blueprint $table) {
            // Existing columns already cover facebook, twitter, linkedin,
            // youtube, instagram, dribble. The bekdash front uses these new
            // ones; legacy columns stay untouched for back-compat.
            if (!Schema::hasColumn('socialsettings', 'whatsapp')) {
                $table->string('whatsapp')->nullable();
            }
            if (!Schema::hasColumn('socialsettings', 'snapchat')) {
                $table->string('snapchat')->nullable();
            }
            if (!Schema::hasColumn('socialsettings', 'tiktok')) {
                $table->string('tiktok')->nullable();
            }
            if (!Schema::hasColumn('socialsettings', 'x_url')) {
                $table->string('x_url')->nullable();
            }
            if (!Schema::hasColumn('socialsettings', 'phone')) {
                $table->string('phone')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('socialsettings', function (Blueprint $table) {
            $table->dropColumn(['whatsapp', 'snapchat', 'tiktok', 'x_url', 'phone']);
        });
    }
};
