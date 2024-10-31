<?php

namespace ProtectMyContent\Protections;

class DisableFeed
{

    protected $plugin_name;
    protected $plugin_version;

    public function __construct($plugin_name, $plugin_version)
    {
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

        add_action('do_feed', [$this, 'disable_feed'], 1);
        add_action('do_feed_rdf', [$this, 'disable_feed'], 1);
        add_action('do_feed_rss', [$this, 'disable_feed'], 1);
        add_action('do_feed_rss2', [$this, 'disable_feed'], 1);
        add_action('do_feed_atom', [$this, 'disable_feed'], 1);
        add_action('do_feed_rss2_comments', [$this, 'disable_feed'], 1);
        add_action('do_feed_atom_comments', [$this, 'disable_feed'], 1);

        add_action('after_setup_theme', [$this, 'remove_rss_feed_links']);
    }

    public function disable_feed()
    {
        wp_die(__('Feeds are disabled', 'protect-my-content'));
    }

    public function remove_rss_feed_links()
    {
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
    }
}
