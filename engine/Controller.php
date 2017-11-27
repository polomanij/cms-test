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
            
    function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

}
