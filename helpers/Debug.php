<?php


namespace Helpers;


class Debug
{

    public static function dump($data)
    {
        echo '<pre style="color: rgba(255,255,255,.75)">';
        var_dump($data);
        echo '</pre>';
    }

}