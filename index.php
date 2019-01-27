<?php
$loader = require('vendor/autoload.php');
$config = new \Config\BuildConfig($loader);
require_once ('generated-conf/config.php');

$klein = new \Klein\Klein();
$klein->with('/', function () use ($klein) {
	$controller = new \Controllers\HurricaneData($klein);
});

$klein->dispatch();

?>
