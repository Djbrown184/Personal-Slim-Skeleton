<?php

    $app->get('/', function ($request, $response, $args)
    {
        global $s;
        $controller = new HomeController($this->get('logger'), $this->view, $this->cache->withExpires($response, time() + 3600));
        return StaffSecurity($s, $response, $controller->home($request, $response, $args, $s));
    });

    $app->get('/maintenance', function ($request, $response, $args)
    {
        global $s;
        if(!$s['settings']['maintenance']):
            return $response->withStatus(301)->withHeader('Location', '/');
        endif;
        $controller = new MaintenanceController($this->get('logger'), $this->view, $this->cache->withExpires($response, time() + 3600));
        return $controller->maintenance($request, $response, $args, $s);
    });