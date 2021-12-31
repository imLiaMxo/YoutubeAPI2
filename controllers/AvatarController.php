<?php

namespace Controllers;

require_once __DIR__ . '../../helpers/Config.php';
use Helpers\Config;


final class AvatarController
{

    private static $steamIds;
    private static $dir = "/var/www/api2/public/img/staff/";
    private static $udir = "/var/www/api2/public/img/users/";

    public static function getUserAvatar()
    {
        $staff = Config::get('staff', 'list');

        foreach ($staff as $steamId => $user) {
            self::$steamIds .= $steamId . ',';
        }

        $query = rtrim(self::$steamIds, ',');
        $apiKey = Config::get('staff', 'apiKey');

        $apiUrl = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$apiKey}&steamids={$query}";
        $response = json_decode(file_get_contents($apiUrl), true);

        // Wipe cached avatars;
        array_map('unlink', array_filter((array) glob(self::$dir . "*")));


        foreach ($response['response']['players'] as $id => $player) {
            $steamId = $player['steamid'];
            $avatar = $player['avatarfull'];

            if(!file_exists(self::$dir)) {
                exit(self::$dir . ' does not exist!');
            }
            copy($avatar, self::$dir . "{$steamId}.jpg");
        }
        exit('Success!');
    }

    public static function getIdvAvatar($userId) {
        $apiKey = Config::get('staff', 'apiKey');
        $apiUrl = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$apiKey}&steamids={$userId}";
        $response = json_decode(file_get_contents($apiUrl), true);

        $player = $response['response']['players'][0];
        $steamId = $player['steamid'];
        $avatar = $player['avatarfull'];

        if(!file_exists(self::$udir)) {
            exit(self::$udir . ' does not exist!');
        }
        copy($avatar, self::$udir . "{$steamId}.jpg");
    }

}