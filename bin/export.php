<?php

include __DIR__ . '/../vendor/autoload.php';

use App\GeoData;

$g = new GeoData();
$markers = $g->getMarkersFromJsonFile();

$dst = __DIR__ . '/../var/json/markers.json';
if (!empty($argv[1]) && ($argv[1] === '--output' || $argv[1] === '-o')) {
    $dst = (strpos($argv[2], '/') === 0) ? $argv[2] : rtrim(getcwd(), '/') . '/' . $argv[2];
}

echo("\033[32m" . sprintf('Found about %d markers.', count($markers)) . "\033[0m" . PHP_EOL);
echo("\033[34m" . sprintf('Exported to %s', $dst) . "\033[0m" . PHP_EOL);

@unlink($dst);
file_put_contents($dst, json_encode($markers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
