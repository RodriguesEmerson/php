<?php

use App\Weather\FakeWeatherFetcher;

require_once __DIR__ . '/inc/all.inc.php';

$fetcher = new FakeWeatherFetcher();
$info = $fetcher->fetch('New York City');

require_once __DIR__ . '/views/index.view.php';