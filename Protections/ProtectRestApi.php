<?php

namespace ProtectMyContent\Protections;

class ProtectRestApi
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_filter('rest_authentication_errors', [$this, 'protect_rest_api']);
    }

    public function protect_rest_api($result)
    {
        if (!empty($result)) {
            return $result;
        }

        if (!is_user_logged_in() || !current_user_can('edit_posts')) {
            return new \WP_Error('rest_not_logged_in', 'You are not currently logged in.', array('status' => 401));
        }

        return $result;
    }
}
