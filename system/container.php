<?php

    $container = $app->getContainer();

    $container['view'] = new \Slim\Views\PhpRenderer(dirname(__DIR__) . "/templates/");

    $container['website'] = function($c)
    {
        global $s;
        $website = [
            'title' => $s['website']['title'],
        ];
        return $website;
    };

    $container['logger'] = function($c)
    {
        global $s;
        $logger = new \Monolog\Logger('NS');
        if($s['settings']['debug']):
            $file_handler = new \Monolog\Handler\StreamHandler(dirname(__DIR__) . "/logs/NS.log");
            $logger->pushHandler($file_handler);
        endif;
        return $logger;
    };