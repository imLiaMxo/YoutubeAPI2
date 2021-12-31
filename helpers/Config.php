<?php


namespace Helpers;


final class Config
{

    public static function get($key, $value = null)
    {
        $file = __DIR__ . '/../config/' . ucfirst($key) . '.php';
        if (!is_readable($file) || is_dir($file)) {
            return $file;
        }
        $config = include($file);
        if ($value == null) {
            return $config;
        }
        return $config[$value];
    }

}