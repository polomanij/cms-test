<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller
{
    /**
    *
    * @var $auth
    */
    protected $auth;
    
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->auth = new Auth();
    }

    
    public function form()
    {
        $this->view->render('login');
    }
    
    public function authAdmin()
    {
        $params = $this->request->post;
        
        $this->auth->authorize('sdad@1.ru');
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }
}
