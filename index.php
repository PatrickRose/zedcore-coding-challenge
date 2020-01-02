<?php

require_once 'vendor/autoload.php';

$oLoader = new \Twig\Loader\FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . 'templates');
$oTwig = new \Twig\Environment($oLoader);

echo $oTwig->render(
	'index.html.twig',
	[
		'report' => new Zedcore\Report($oTwig)
	]
);
