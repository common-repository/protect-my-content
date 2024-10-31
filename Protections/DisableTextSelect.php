<?php

namespace ProtectMyContent\Protections;

class DisableTextSelect
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_action('wp_enqueue_scripts', [$this, 'render_style'], 90);
    }

    public function render_style()
    {

        if (!is_admin()) {
            wp_register_style('protect-my-content-disable-text-select', false);

            wp_enqueue_style('protect-my-content-disable-text-select');

            wp_add_inline_style('protect-my-content-disable-text-select', "body {
                -webkit-touch-callout: none; /* iOS Safari */
                -webkit-user-select: none; /* Safari */
                -khtml-user-select: none; /* Konqueror HTML */
                -moz-user-select: none; /* Old versions of Firefox */
                -ms-user-select: none; /* Internet Explorer/Edge */
                user-select: none; /* Non-prefixed version, currently
                                    supported by Chrome, Edge, Opera and Firefox */
            }");
        }

    }
}
