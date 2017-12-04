<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller {
    /**
     *
     * @var $auth
     */
    protected $auth;

    /**
     * 
     * @param $di
     */
    function __construct($di) {
        parent::__construct($di);
        
        $this->auth = new Auth();
        $this->checkAuthorization();
    }
    
    public function checkAuthorization()
    {
        if (!$this->auth->authorized()) {
            //redirect
            header('Location: /cms-test/admin/login/', true, 301);
            exit();
        }
    }
}
