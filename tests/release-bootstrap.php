<?php

require __DIR__.'/../vendor/autoload.php';

// A separate bootstrap runs ALL existing tests against disposable synthetic data.
// No .env changes, application DB connection, or original-test rewrites are needed.
$directory = sys_get_temp_dir().'/cangrows-release-'.bin2hex(random_bytes(6));
mkdir($directory, 0777, true);
mkdir($directory.'/views');
touch($directory.'/release.sqlite');
foreach ([
    'APP_ENV' => 'testing', 'APP_URL' => 'https://example.test', 'APP_DEBUG' => 'false',
    'DB_CONNECTION' => 'sqlite', 'DB_DATABASE' => $directory.'/release.sqlite',
    'VIEW_COMPILED_PATH' => $directory.'/views', 'SESSION_DRIVER' => 'array',
    'CACHE_DRIVER' => 'array', 'MAIL_MAILER' => 'array', 'QUEUE_CONNECTION' => 'sync',
] as $name => $value) {
    putenv($name.'='.$value);
    $_ENV[$name] = $_SERVER[$name] = $value;
}
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
\Tests\Support\ReleaseFixture::load();
file_put_contents($directory.'/fixture-ready.txt', 'Synthetic release QA only; no application data.');
echo 'Disposable release fixture: '.$directory.PHP_EOL;
