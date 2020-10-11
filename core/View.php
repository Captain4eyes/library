<?php


/**
 * Class View
 */
class View
{
    /**
     * Rendering template with content and parameters
     * @param string $template
     * @param array|null $params
     * @return bool
     */
    public static function render(string $template, array $params = [])
    {
        extract($params);

        if (file_exists(TEMPLATE_DIR . $template . '.phtml')) {
            include_once TEMPLATE_DIR . $template . '.phtml';
            return true;
        } else {
            include_once TEMPLATE_DIR . '404.phtml';
            return false;
        }
    }

    /**
     * Loading a script file by checking the extension
     * @param $script
     * @return string
     */
    public static function loadScript($script)
    {
        $result = '';
        $extension = substr(strrchr($script,'.'),1);
        switch ($extension) {
            case 'css':
                $result = '<link rel="stylesheet" href="' . STYLES_DIR . $script . '">';
                break;
            case 'js':
                $result = '<script type="text/javascript" src="' . JS_DIR . $script . '"></script>';
                break;
        }
        return $result;
    }
}