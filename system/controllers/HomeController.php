<?php

    class HomeController
    {
        private $logger;
        private $view;
		private $cache;
		
		function __construct($logger, $view, $cache)
		{
			$this->logger  = $logger;
			$this->view    = $view;
			$this->cache   = $cache;
        }
        
        public function home($request, $response, $args, $s)
        {
            $this->logger->addDebug("Home", ["IP" => $_SERVER["HTTP_X_REAL_IP"], "AGENT" => $_SERVER['HTTP_USER_AGENT']]);
            $s["website"]["title"] = "Home | " . $s["website"]["title"];
            $content_header = $this->view->fetch("default" . $s["website"]["templatehd"] . $s["website"]["extbase"], ["args" => $args, "website" => $s['website']]);
            $content = $this->view->fetch("Home".$s["website"]["extview"], ["args" => $args, "website" => $s["website"]]);
            $this->view->render($response, $s["website"]["template"].$s["website"]["extbase"], ["args" => $args, "website" => $s["website"], "content" => $content, "content_header" => $content_header]);
			return $this->cache;
        }
    }