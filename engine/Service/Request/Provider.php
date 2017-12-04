<?php

namespace Engine\Service\Request;

use Engine\Core\Request\Request;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     *
     * @var string
     */
    public $serviceName = 'request';
    
    /**
     * @return mixed
     */
    public function init()
    {
        $request = new Request();
        $this->di->set($this->serviceName, $request);
    }
}
