<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('doctors', 'featured')) {
            return;
        }

        Schema::table('doctors', function (Blueprint $table) {
            // Highlights the doctor as the main team member on the About page.
            $table->tinyInteger('featured')->default(0)->after('active');
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('doctors', 'featured')) {
            return;
        }

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
    }
};
