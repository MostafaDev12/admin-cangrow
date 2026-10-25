<?php

// Loopback-only QA router. Never put this file in the public document root.
$directory = getenv('CANGROWS_RELEASE_FIXTURE');
if (! $directory || ! is_file($directory.'/fixture-ready.txt') || ! is_file($directory.'/release.sqlite') || ! str_contains(realpath($directory), 'cangrows-release-')) {
    http_response_code(503);
    exit('Disposable fixture marker required.');
}
$root = dirname(__DIR__, 2);
foreach ([
    'APP_ENV' => 'testing', 'APP_URL' => 'https://localhost:18881', 'APP_DEBUG' => 'false',
    'DB_CONNECTION' => 'sqlite', 'DB_DATABASE' => $directory.'/release.sqlite',
    'VIEW_COMPILED_PATH' => $directory.'/views', 'SESSION_DRIVER' => 'file',
    'CACHE_DRIVER' => 'array', 'MAIL_MAILER' => 'array', 'QUEUE_CONNECTION' => 'sync',
] as $name => $value) {
    putenv($name.'='.$value);
    $_ENV[$name] = $_SERVER[$name] = $value;
}
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (str_ends_with($path, '/release-fixture.png')) {
    header('Content-Type: image/png');
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+a8u0AAAAASUVORK5CYII=');

    return;
}
if ($path !== '/' && is_file($root.'/public'.$path) && str_starts_with(realpath($root.'/public'.$path), realpath($root.'/public').DIRECTORY_SEPARATOR)) {
    return false;
}
// Our dedicated loopback TLS terminator sets this header; production proxy trust is unchanged.
if (($_SERVER['HTTP_X_RELEASE_QA_TLS'] ?? '') === 'loopback-only') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 18881;
}
require $root.'/vendor/autoload.php';
$app = require $root.'/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();
if (! is_dir($directory.'/sessions')) {
    mkdir($directory.'/sessions');
}
config(['session.files' => $directory.'/sessions', 'logging.channels.single.path' => $directory.'/http.log']);
$response = $kernel->handle($request = \Illuminate\Http\Request::capture());
$response->send();
$kernel->terminate($request, $response);
