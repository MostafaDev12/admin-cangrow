<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * The legacy database dump created `categories` as MyISAM, which is
     * non-transactional: writes to it ignore database transactions, so
     * admin operations cannot be rolled back and DatabaseTransactions-based
     * tests silently leak writes into the database. Convert it to InnoDB
     * like every other content table.
     */
    public function up(): void
    {
        $engine = DB::selectOne(
            'SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ?',
            ['categories']
        );

        if ($engine && strcasecmp((string) $engine->ENGINE, 'InnoDB') !== 0) {
            DB::statement('ALTER TABLE categories ENGINE = InnoDB');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Intentionally left non-destructive: keeping InnoDB is always safe.
    }
};
