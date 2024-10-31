<?php

namespace ProtectMyContent\Protections;

class DisableIframeEmbedding
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_action('send_headers', [$this, 'send_headers']);
    }

    public function send_headers()
    {
        header('X-Frame-Options: SAMEORIGIN');
    }
}
