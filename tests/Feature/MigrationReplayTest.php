<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Schema;
use Tests\Support\ProjectDatabase;
use Tests\TestCase;

class MigrationReplayTest extends TestCase
{
    public function test_complete_existing_migration_chain_is_replayable(): void
    {
        ProjectDatabase::create(includeKnownDuplicate: true);
        $this->assertTrue(Schema::hasColumn('services', 'is_published'));
    }
}
