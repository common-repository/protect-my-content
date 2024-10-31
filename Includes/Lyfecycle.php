<?php

namespace ProtectMyContent\Includes;

class Lyfecycle
{
    public static function activate()
    {
        do_action('ProtectMyContent/setup');
    }

    public static function deactivate()
    {
    }

    public static function uninstall()
    {
        do_action('ProtectMyContent/cleanup');
    }
}
