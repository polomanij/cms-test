<?php
namespace Engine\DI;

class DI
{
    /**
     *
     * @var type 
     */
    private $container = [];
    
    /**
     * 
     * @param type $key
     * @param type $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;
        
        return $this;
    }
    
    /**
     * 
     * @param type $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->has($key) ? $this->container[$key] : NULL;
    }
    
    /**
     * 
     * @param type $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->container[$key]);
    }
}
