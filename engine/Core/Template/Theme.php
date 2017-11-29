<?php

namespace Engine\Core\Template;

use Exception;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];
    
    /**
     *Url current theme
     * @var string
     */
    public $url = '';
    
    protected $data = [];
    
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

    /**
     * 
     * @param $name
     */
    public function header($name = null)
    {
        $name = (string) $name;
        $file = 'header';
        
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    /**
     * 
     * @param type $name
     */
    public function footer($name = '')
    {
        $name = (string) $name;
        $file = 'footer';
        
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    /**
     * 
     * @param type $name
     */
    public function sidebar($name = '')
    {
        $name = (string) $name;
        $file = 'sidebar';
        
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        
        $this->loadTemplateFile($file);
    }
    
    /**
     * 
     * @param type $name
     * @param type $data
     */
    public function block($name = '', $data = [])
    {
        $name = (string) $name;
        
        if ($name !== '') {
            $this->loadTemplateFile($name, data);
        }
    }
    
    /**
     * 
     * @param type $nameFile
     * @param type $data
     * @throws Exception
     */
    public function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        
        if (is_file($templateFile)) {
            extract($data);
            require_once $templateFile;
        } else {
            throw new Exception(sprintf('View file %s does not exist!', $templateFile));
        }
    }
}
