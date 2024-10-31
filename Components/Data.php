<?php

namespace ProtectMyContent\Components;

class Data
{    
    /**
     * get_data
     *
     * @return void
     */
    public static function get_data($file = 'settings')
    {
        $path = PROTECTMYCONTENT_PATH . "data/$file.php";

        if (!file_exists($path)) {
            return false;
        }

        $data = include $path;
        return (array) $data;
    }
}
