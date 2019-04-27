<?php

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require dirname(__DIR__) . '/vendor/autoload.php';

	$s   = require dirname(__DIR__) . '/system/settings.php';
	
	$c = new \Slim\Container($s);
	
	$c['notFoundHandler'] = function ($c) {
		return function ($request, $response) use ($c) {
			return $response->withStatus(404)->withHeader('Location', '/404');
		};
	};
	
	$c['cache'] = function () {
		return new \Slim\HttpCache\CacheProvider();
	};
	
	$app = new \Slim\App($c);
	$app->add(new \Slim\HttpCache\Cache('public', 86400));

	require dirname(__DIR__) . '/system/autoload.php';
	
	$app->run();