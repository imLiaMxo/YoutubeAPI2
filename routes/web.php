<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/Router/Router.php';
require __DIR__ . '/../helpers/Config.php';
require __DIR__ . '/../helpers/Debug.php';
require __DIR__ . '/../vendor/SteamAuth/SteamAuth.php';
require __DIR__ . '/../controllers/AuthController.php';
require __DIR__ . '/../controllers/DownloadController.php';
require __DIR__ . '/../controllers/SpotifyController.php';

use Helpers\Config;
use Helpers\Debug;
use Controllers\AuthController;
use Controllers\SpotifyController;
use Controllers\DownloadController;
use Vendor\Router\Router;
use Vendor\SteamAuth\SteamAuth;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$route = new Router();
$route->setBasePath('/');

// Home
$route->get('/', function() {
    include(__DIR__ . '/../pages/index.php'); // Home Page
});

// Upgrade

$route->get('/upgrade', function() {
    include(__DIR__ . '/../pages/upgrade.php'); // Upgrade Page
});

$route->mount('/dashboard', function() use ($route) {

    $route->get('/', function() {
        include(__DIR__ . '/../pages/dashboard.php'); // Dashboard Home
    });
});

$route->get('/spotifytest', function() {
    global $SpotifyController;
    $spotify = new SpotifyController();

    $spotify->requestNewAuthKey();
    echo $spotify->clientKey;
});

$route->get('/download/{apikey}/{videoId}', function($apiKey, $videoId){
    global $AuthController;
    global $DownloadController;
    global $YoutubeDL;
    $yt = new YoutubeDl();
    $auth = new AuthController();
    $dl = new DownloadController();

    if($auth->canDownload($apiKey)){
        if(!$dl->hasDownloaded($videoId)) {
            $collection = $yt->download(
                Options::create()
                    ->downloadPath("/var/www/api2/cache/")
                    ->extractAudio(true)
                    ->audioFormat('mp3')
                    ->audioQuality('0') // best
                    ->output('%(id)s.%(ext)s')
                    ->url('https://www.youtube.com/watch?v=' . $videoId)
            );
            
            foreach ($collection->getVideos() as $video) {
                if ($video->getError() !== null) {
                    echo '{"error": true,"errorMsg": "Error downloading video: ' . $video->getError() . '"}';
                } else {
                    $arr = array(
                        "videoTitle" => $video->getTitle(),
                        "videoId" => $videoId,
                        "videoLength" => $video->getDuration(),
                        "vidUrl" => "https://api2.imliamxo.com/cache/" . $videoId
                    ); 
                    $dl->insertVideo($videoId, $video->getFilesize(), $video->getTitle(), $video->getDuration(), $apiKey, time());
                    echo json_encode($arr, true);
                    $video->getFile(); // audio file
                }
            }
        } else {
            $tmpArr = $dl->getVideoData($videoId);
            $arr = array(
                    "videoTitle" => $tmpArr['vid_title'],
                    "videoId" => $videoId,
                    "videoLength" => $tmpArr['vid_duration'],
                    "videoUrl" => "https://api2.imliamxo.com/cache/" . $tmpArr['vid_id']
            );
            echo json_encode($arr, true);
        }
    } else {
        echo '{"error": true,"errorMsg": "Cannot download due to authentication error"}';
    }
    //echo $apiKey . '<br>' . $videoId;
});

$route->mount('/api', function() use ($route) {


    $route->post('/key/reset', function() {
        global $AuthController;
        global $SteamAuth;
        $steam = new SteamAuth();
        $auth = new AuthController();

        if($steam->loggedIn()){
            $curSteamId = $_POST['steamid'];
            if($curSteamId == $steam->steamid){
                echo $auth->generateNewKey($steam->steamid);
            } else {
                echo 'Invalid SteamID';
            }
        } else {
            echo 'Invalid Session.';
        }
    });

    $route->get('/spotify', function() {

        $url = "https://api.spotify.com/v1/me/player/currently-playing";
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
        "Authorization: Bearer AUTHTOKENSPOTIFY >BROKEN<",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        $tbl = json_decode($resp, true);
        //print_r($tbl);
        if( !count($tbl) ){
            echo sprintf("<i class=\"fab fa-spotify\"></i> %s", "Nothing Currently Playing...");
        } else {
            echo sprintf("<i class=\"fab fa-spotify\"></i> %s - %s", $tbl["item"]["name"], $tbl["item"]["artists"][0]["name"]);
        }
    });


});

// Logout
$route->post('/logout', function() {
    global $SteamAuth;
    $steam = new SteamAuth();
    $steam->logout();
    header('Location: /');
});

// 404
$route->set404(function() {
    echo 'fucked it mate';
});

$route->run();