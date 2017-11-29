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
            
    function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
    }

}
