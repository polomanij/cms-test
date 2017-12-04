<?php

namespace Engine;

abstract class Controller
{
    /**
     *
     * @var \Engine\DI\DI
     */
    protected $di;
    protected $db;
    protected $view;
    protected $config;
    protected $request;
            
    function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
    }

}
