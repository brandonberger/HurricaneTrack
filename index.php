<?php
$loader = require('vendor/autoload.php');
$config = new \Config\BuildConfig($loader);
require_once ('generated-conf/config.php');

$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service) {
	$service->track = \Models\HurricaneTrackQuery::create()->find();
	$service->render('templates/default.php');
});

$klein->dispatch();

?>
