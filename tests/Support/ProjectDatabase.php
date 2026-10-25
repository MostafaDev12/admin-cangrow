<?php

namespace Tests\Support;

use Illuminate\Support\Facades\DB;

class ProjectDatabase
{
    public static function create(bool $includeKnownDuplicate = false): void
    {
        if (config('database.default') !== 'sqlite' || DB::connection()->getDatabaseName() !== ':memory:') {
            throw new \RuntimeException('Project QA fixtures require isolated in-memory SQLite.');
        }

        // These baseline tables are in the repository SQL snapshot but have no
        // create-table migration. Read schema only; never import snapshot data.
        $snapshot = file_get_contents(base_path('database.sql'));
        foreach (['admins', 'contacts', 'counters', 'email_templates', 'model_categories', 'roles', 'socialsettings'] as $table) {
            if (! preg_match('/CREATE TABLE `'.preg_quote($table, '/').'` \((.*?)\) ENGINE=/s', $snapshot, $match)) {
                throw new \RuntimeException('Missing baseline schema: '.$table);
            }
            preg_match_all('/^\s*`(\w+)` ([^\r\n]+)/m', $match[1], $columns, PREG_SET_ORDER);
            $definitions = [];
            foreach ($columns as $column) {
                if ($column[1] === 'id') {
                    $definitions[] = '"id" INTEGER PRIMARY KEY AUTOINCREMENT';

                    continue;
                }
                $type = preg_match('/^(?:tinyint|int|bigint)/i', $column[2]) ? 'INTEGER' : 'TEXT';
                $default = '';
                if (preg_match('/ DEFAULT (\x27[^\x27]*\x27|CURRENT_TIMESTAMP|NULL|\d+)/i', $column[2], $value)) {
                    $default = ' DEFAULT '.$value[1];
                }
                $definitions[] = '"'.$column[1].'" '.$type.$default;
            }
            DB::statement('CREATE TABLE "'.$table.'" ('.implode(', ', $definitions).')');
        }
        app('migration.repository')->createRepository();
        $paths = glob(database_path('migrations/*.php'));
        if (! $includeKnownDuplicate) {
            // The February 24 migration adds youtube_url a second time. The
            // separate MigrationReplayTest runs the unmodified chain and exposes
            // this existing failure. Skip only that redundant step for HTTP QA.
            $paths = array_values(array_filter($paths, fn ($path) => basename($path) !== '2025_02_24_202447_add_youtube_url_column_to_media_table.php'));
        }
        app('migrator')->run($paths);

        $settings = ['phones' => '123456', 'emails' => 'qa@example.test'];
        foreach (['ar', 'en', 'fr'] as $locale) {
            $settings['title_'.$locale] = 'QA Clinic '.$locale;
            $settings['addresses_'.$locale] = '[]';
            $settings['logo_'.$locale] = 'qa-logo.png';
        }
        DB::table('generalsettings')->where('id', 1)->update($settings);
        DB::table('socialsettings')->insert(['id' => 1, 'f_status' => 0, 't_status' => 0, 'd_status' => 0, 'ystatus' => 0]);
        foreach (['ar' => 1, 'fr' => 0] as $locale => $rtl) {
            DB::table('languages')->insert(['name' => $locale, 'sign' => $locale, 'rtl' => $rtl, 'is_default' => 0]);
        }
    }
}
