# Elnour Tank CMS release — deployment notes (branch `elnourTank`)

This release converts the hardcoded frontend content (commit "asd") into dashboard-managed
content, and removes the public exposure of the full `generalsettings` row (which contained
SMTP credentials) from the site layout.

## Deployment commands (run in this order)

```bash
php artisan migrate --path=database/migrations/2026_07_04_000001_add_elnour_cms_columns.php --force
php artisan migrate --path=database/migrations/2026_07_04_000002_create_elnour_cms_tables.php --force
php artisan migrate --path=database/migrations/2026_07_04_000003_convert_categories_table_to_innodb.php --force
php artisan db:seed --class=ElnourContentSeeder --force
php artisan view:clear
php artisan config:clear
php artisan route:clear
```

Note on the third migration: the legacy dump created `categories` as **MyISAM**
(non-transactional — writes to it cannot be rolled back). It is converted to InnoDB
to match every other content table. Other legacy tables from the dump may still be
MyISAM; converting them is a recommended follow-up but is not required by this release.

## Why you must NOT run plain `php artisan migrate`

The production/dev database was originally imported from `database.sql`, not built by running
the migration files, so the `migrations` table does not reflect the real schema. A plain
`php artisan migrate` replays old migrations and fails (first on
`2024_12_02_202447_add_details_column_to_blogs_table` — duplicate column `short_details_ar`)
and could leave the migrator in a half-applied state. Until that historical drift is repaired
(by reconciling the `migrations` table with the actual schema), always run **new** migrations
individually with `--path=... --force` as shown above. Both new migrations in this release are
additionally guarded with `Schema::hasTable` / `Schema::hasColumn` checks, so re-running them
is safe.

## What the seeder does (safe to re-run)

`ElnourContentSeeder` is idempotent:

- copies the hardcoded images into the model upload directories
  (`assets/images/{categories,services,slider,partners,certificates,features}` and
  `assets/images/` root) with ASCII filenames — it never overwrites existing files;
- upserts the 5 categories and 20 products by slug, seeds stats/cards/sections copy;
- fills the new `pagesettings` / `generalsettings` columns **only when they are empty**
  (admin edits are never overwritten);
- deactivates (`is_active = 0`) stale rows left over from previous client sites — it never
  deletes rows or files.

## Content follow-up for the site admin

17 of the 20 seeded products have empty `short_details` / `details` (the 3 legacy tank
products kept their existing copy). They are flagged with a
yellow **«يحتاج محتوى»** badge in لوحة التحكم → المنتجات. Product pages render fine without
them (image + title); fill them in from the dashboard when copy is ready.
