<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
    private $controller;
    private $parameters;
    
    function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    function getController()
    {
        return $this->controller;
    }

    function getParameters()
    {
        return $this->parameters;
    }
}
