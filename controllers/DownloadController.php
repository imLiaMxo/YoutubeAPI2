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

    class DownloadController
    {
        private $host;
        private $user;
        private $pass;
        private $db;
        private $table;

        public function __construct()
        {
            $config = Config::get('Mysql', 'main_db');

            $this->host = $config['host'];
            $this->db = $config['db'];
            $this->user = $config['user'];
            $this->pass = $config['pass'];

            return $this;
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

        public function readableTime($unix): string
        {
            return Carbon::createFromTimeStamp($unix)->toDayDateTimeString();
        }


        public function hasDownloaded($videoId): bool
        {
            $conn = $this->connect()->prepare("SELECT vid_id FROM downloads WHERE vid_id = '{$videoId}'");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return $res ? true : false;
        }

        public function getVideoData($videoId): array
        {
            $conn = $this->connect()->prepare("SELECT * FROM downloads WHERE vid_id = '{$videoId}'");
            $conn->execute();
 
            return $conn->fetch(PDO::FETCH_ASSOC);
        }
        
        public function insertVideo($videoId, $videoSize, $videoTitle, $videoDuration, $addedBy, $unix)
        {
            $time = time();
            $conn = $this->connect()->prepare("INSERT INTO downloads (vid_id, vid_title, vid_duration, vid_filesize, requested_by, timestamp) VALUES ('$videoId', '{$this->connect()->quote($videoTitle)}', $videoDuration, $videoSize, '$addedBy', $unix)");
            $conn->execute();

            $update = $this->connect()->prepare("UPDATE users SET daily_usage = daily_usage + 1, last_activity = {$time} WHERE apikey = '{$addedBy}'");
            $update->execute();
        }

        public function getKeyUserData($keyUsed): array
        {
            $conn = $this->connect()->prepare("SELECT * FROM downloads WHERE requested_by = '{$keyUsed}' ORDER BY timestamp DESC LIMIT 30");
            $conn->execute();
 
            return $conn->fetchAll(PDO::FETCH_ASSOC);
        }

        public function countUsesToday($userId): int
        {
            $conn = $this->connect()->prepare("SELECT daily_usage FROM users WHERE steamid = '{$userId}'");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return $res ? $res['daily_usage'] : 0;
        }

        public function countAllUserUses($apiKey): int
        {
            $conn = $this->connect()->prepare("SELECT COUNT(id) FROM downloads WHERE requested_by = '{$apiKey}'");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return $res ? $res['COUNT(id)'] : 0;
        }

        public function countAllUses(): int
        {
            $conn = $this->connect()->prepare("SELECT COUNT(id) FROM downloads");
            $conn->execute();
 
            $res = $conn->fetch(PDO::FETCH_ASSOC);
            return $res ? $res['COUNT(id)'] : 0;
        }
    }