<?php

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

class View
{
    protected $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }
    
    /**
     * 
     * @param type $template
     * @param type $vars
     * @throws \InvalidArgumentException
     * @throws \Engine\Core\Template\Exception
     */
    public function render($template, $vars = [])
    {
        $templatePath = $this->getTemplatePath($template, ENV);
        
        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(sprintf('Template "%s" not found in %s', $template, $templatePath));
        }
        
        
        $this->theme->setData($vars);
        extract($vars);
        
        ob_start();
        ob_implicit_flush(0);
        
        try {
            require $templatePath;
        } catch (Exception $ex) {
            ob_end_clean();
            throw $ex;
        }
        
        echo ob_get_clean();
    }
    
    private function getTemplatePath($template, $env)
    {
        switch ($env) {
            case 'Admin':
                return ROOT_DIR . '/View/' . $template . '.php';
            case 'Cms':
                return ROOT_DIR . '/content/Themes/default/' . $template . '.php';
        }
    }
}
