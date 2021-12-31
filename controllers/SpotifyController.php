<?php

namespace Controllers;

require_once __DIR__ . '../../helpers/Config.php';
use Helpers\Config;


final class SpotifyController
{

    public $clientKey;
    private $secretKey;
    public $generatedKey;

    function __construct() {
        $keys = Config::get('Spotify', 'creds');
        $this->clientKey = $keys['client_key'];
        $this->secretKey = $keys['secret_key'];
    }

    public function requestNewAuthKey() {
        $postKey = sprintf("Basic %s:%s", base64_encode($this->clientKey), base64_encode($this->secretKey));
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=user-read-currently-playing");
        
        $headers = array();
        $headers[] = 'Authorization: ' . $postKey;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        print_r($result);
    }

}