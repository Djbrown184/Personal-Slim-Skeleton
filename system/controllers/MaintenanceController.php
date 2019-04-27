<?php

    class MaintenanceController
    {

        private $logger;
        private $view;
        private $cache;

        function __construct($logger, $view, $cache)
        {
            $this->logger   = $logger;
            $this->view     = $view;
            $this->cache    = $cache;
        }

        public function maintenance($request, $response, $args, $s)
        {
            $response = $this->view->render($response, "Maintenance" . $s['website']['extview'], ["NS" => $this]);
            return $response;
        }

    }