<?php

namespace ProtectMyContent\Protections;

class DisableContextMenu
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_action('wp_enqueue_scripts', [$this, 'render_script'], 90);
    }

    public function render_script()
    {

        if (!is_admin()) {
            wp_register_script('protect-my-content-disable-context-menu', '');

            wp_enqueue_script('protect-my-content-disable-context-menu');

            wp_add_inline_script('protect-my-content-disable-context-menu', "document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
            });");
        }
    }

}
