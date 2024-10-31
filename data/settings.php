<?php
if (!defined('ABSPATH'))
    exit;

return [
    [
        'slug' => 'disable-context-menu',
        'name' => __('Disable Contextual Menu', 'protect-my-content'),
        'type' => 'checkbox',
        'description' => __('Check this to disable acess to contextual menu', 'protect-my-content'),
    ],
    [
        'slug' => 'disable-text-select',
        'name' => __('Disable Text Selection', 'protect-my-content'),
        'type' => 'checkbox',
        'description' => __('Check this to disable text selection', 'protect-my-content'),
    ],
    [
        'slug' => 'disable-feed',
        'name' => __('Disable Feed', 'protect-my-content'),
        'type' => 'checkbox',
        'description' => __('Check this to disable the web\'s feed', 'protect-my-content'),
    ],
    [
        'slug' => 'disable-iframe-embedding',
        'name' => __('Disable iframe Embedding', 'protect-my-content'),
        'type' => 'checkbox',
        'description' => __('Check this to prevent external embedding via iframe', 'protect-my-content'),
    ],
    [
        'slug' => 'protect-rest-api',
        'name' => __('Protect REST API', 'protect-my-content'),
        'type' => 'checkbox',
        'description' => __('Check this to protect the REST API from non-logged users', 'protect-my-content'),
    ],
];
