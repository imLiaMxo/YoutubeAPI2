<?php

    namespace Controllers;

    require_once __DIR__ . '/../helpers/Config.php';
    require_once __DIR__ . '/../helpers/Debug.php';
    require_once __DIR__ . '/../vendor/Carbon/autoload.php';

    use PDO;
    use PDOException;
    use Helpers\Config;
    use Helpers\Debug;
    use Carbon\Carbon;

    class AuthController
    {
        private $host;
        private $user;
        private $pass;
        private $db;
        private $table;
        private $apiKey;

        public function __construct()
        {
            $config = Config::get('Mysql', 'main_db');

            $this->host = $config['host'];
            $this->db = $config['db'];
            $this->user = $config['user'];
            $this->pass = $config['pass'];
            $this->apiKey = Config::get('Staff', 'apiKey');

            return $this;
        }

        public static function randomizedKey($strLength)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $strLength; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        private function connect(): PDO
        {
            try {
                $conn = new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            } catch (PDOException $e)
            {
                return Debug::dump($e->getMessage());
            }
        }

        public function humanTime($unix): string
        {
            return Carbon::createFromTimeStamp($unix)->diffForHumans();
        }

        public function getUserName($userId): string
        {
            $conn = $this->connect()->prepare("SELECT name FROM users WHERE steamid = $userId");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return ucwords($res ? $res['name'] : "null");
        }

        public function getUserKey($userId): string
        {
            $conn = $this->connect()->prepare("SELECT apikey FROM users WHERE steamid = $userId");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return ucwords($res ? $res['apikey'] : "null");
        }

        public function canDownload($key)
        {
            $conn = $this->connect()->prepare("SELECT * FROM users WHERE apikey = '{$key}'");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            if(!$res) { return false; }
            if($res['active'] == 1){
                if($res['account_type'] == 1){
                    return true;
                } else {
                    if($res['daily_usage'] <= 30){
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }

        public function generateNewKey($userId): string
        {
            $newKey = self::randomizedKey(48);
            $conn = $this->connect()->prepare("UPDATE users SET apikey = \"{$newKey}\" WHERE steamid = $userId");
            $conn->execute();

            return $newKey;
        }


        public function userValid($steamId): bool
        {
            $conn = $this->connect()->prepare("SELECT steamid FROM users WHERE steamid = $steamId");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return $res ? true : false;
        }

        public function lastUse($userId): string
        {
            $conn = $this->connect()->prepare("SELECT last_activity FROM users WHERE steamid = $userId");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            
            return $res ? Carbon::createFromTimeStamp($res['last_activity'])->diffForHumans() : "Never";
        }
        
        public function insertUser($steamId, $userName)
        {
            $newKey = self::randomizedKey(48);
            $time = time();
            $conn = $this->connect()->prepare("INSERT INTO users (steamid, username, account_type, apikey, last_activity, created, daily_usage, active) VALUES ('$steamId', '$userName', 0, '$newKey', $time, $time, 0, 1)");
            $conn->execute();
        }


    }