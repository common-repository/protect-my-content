<?php

namespace ProtectMyContent\Includes;

class Loader
{
    protected $plugin_name;
    protected $plugin_version;

    public function __construct()
    {
        $this->plugin_version = defined('PROTECTMYCONTENT_VERSION') ? PROTECTMYCONTENT_VERSION : '1.0.0';
        $this->plugin_name = 'protect-my-content';
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        foreach (glob(PROTECTMYCONTENT_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\ProtectMyContent\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name($this->plugin_name, $this->plugin_version);
                } catch (\Throwable $e) {
                    continue;
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('protect-my-content', false, dirname(PROTECTMYCONTENT_BASENAME) . '/languages/');
    }
}
