<?php

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

class Cms
{
    /**
     * 
     * @param type $di
     */
    private $di;
    
    public $router;
    /**
     * 
     * @param type $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }
    
    /**
     * Run Cms
     */
    public function run()
    {
        try {
            $this->router->add('home', '/cms-test/', 'HomeController:index');
            $this->router->add('news', '/cms-test/news', 'HomeController:news');
            $this->router->add('news_single', '/cms-test/news/(id:int)', 'HomeController:news');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();

            print_r($parameters);

            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
}
