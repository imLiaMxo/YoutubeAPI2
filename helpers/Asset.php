<?php

namespace Helpers;

require_once __DIR__ . '/Config.php';
use Helpers\Config;

final class Asset
{

    public static function randomise($strLength)
    {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $strLength; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

    public static function get($asset)
    {
        return self::strip(Config::get('meta', 'url'), $asset);
    }

    private static function strip($url, $asset)
    {
        return rtrim($url, '/') . '/public/' . ltrim($asset, '/') . '?uid=' . self::randomise(64);
    }

}