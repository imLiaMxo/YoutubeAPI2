<?php
    require_once 'helpers/Asset.php';
    require_once 'helpers/Config.php';
    require_once 'controllers/DownloadController.php';

    use Helpers\Asset;
    use Helpers\Config;
    use Controllers\DownloadController;

    $dl = new DownloadController();
?>

<!doctype html>
<html lang="en" data-theme="light" class="dark">
    <head>
        <meta charset="UTF-8">
        <title><?= Config::get('meta', 'title') ?>: Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="og:title" content="<?= Config::get('meta', 'title') ?>: Home"/>
        <meta name="description" content="<?= Config::get('meta', 'description') ?>">
        <meta name="og:description" content="<?= Config::get('meta', 'description') ?>"/>
        <meta name="keywords" content="<?= Config::get('meta', 'keywords') ?>">
        <meta name="theme-color" content="<?= Config::get('meta', 'embed-color') ?>">

        <meta name="og:type" content="<?= Config::get('meta', 'type') ?>"/>
        <meta name="og:url" content="<?= Config::get('meta', 'url') ?>"/>
        <meta name="url" content="<?= Config::get('meta', 'url') ?>">
        <meta name="identifier-URL" content="<?= Config::get('meta', 'url') ?>">
        <meta name="revisit-after" content="<?= Config::get('meta', 'revisit-after') ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="robots" content="<?= Config::get('meta', 'robots') ?>">

        <meta name="author" content="<?= Config::get('meta', 'author') ?>">
        <meta name="designer" content="<?= Config::get('meta', 'designer') ?>">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">


        <link rel="icon" type="image/png" sizes="32x32" href="<?= Asset::get('Img/logo.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= Asset::get('Img/logo.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= Asset::get('Img/logo.png'); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?= Asset::get('Img/logo.png'); ?>">

        <meta name="og:image" content="<?= Asset::get('Img/logo.png'); ?>">
        <meta name="twitter:image" content="<?= Asset::get('Img/logo.png'); ?>">
        <meta name="twitter:card" content="summary">

        <link rel="stylesheet" href="<?= Asset::get('/css/style.css') ?>">
        <link rel="stylesheet" href="<?= Asset::get('/css/theme.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@1.16.2/dist/full.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <style>
            .dropdown:focus-within .dropdown-menu {
                opacity:1;
                transform: translate(0) scale(1);
                visibility: visible;
            }
        </style>
    </head>
    <body>
        <div class="app">
            <?php
            include('includes/navbar.php');

            if(!$steam->loggedIn()){ ?>
                <section class="w-1/2 py-12 mx-auto bg-white" id="wtfbro">
                <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Hold Up!</h1>
                        <p class="mb-8 leading-relaxed">How did you wonder here? You need to be logged in!</p>
                    </div>
                </div>
            </section>
            <?php } else { ?>

            <section class="w-full py-12 mx-auto bg-white" id="dash">
                <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                        <div class="avatar">
                            <div class="mb-8 rounded-full w-64 h-64 ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="<?= Asset::get("img/users/{$steam->steamid}.jpg"); ?>"/>
                            </div>
                        </div> 
                    </div> 
                    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Your Dashboard</h1>
                        <p class="mb-8 leading-relaxed">Here you can see your usage, view and reset your key. Remember, it is important you don't share your key with anybody as misuse will result in your key being blocked.</p>
                        <div class="flex w-full md:justify-start justify-center items-end">
                            <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
                                <label for="hero-field" class="leading-7 text-sm text-gray-600">Your API Key</label>
                                <label for="hero-field" class="text-sm text-purple-600"><small>Last Used: <?= $auth->lastUse($steam->steamid); ?></small></label>
                                <input
                                    type="text"
                                    id="apiKey"
                                    name="apiKey"
                                    value="<?= $auth->getUserKey($steam->steamid); ?>"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" disabled
                                />
                            </div>
                        
                        </div>
                        <div class="flex lg:flex-row md:flex-col py-4">
                        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" data-tippy-content="Copies your API key to your clipboard." onclick="copyToClipboard()">Copy</button>
                        <div class="divider">OR</div>
                            <!-- Refresh Button -->
                            <form id="apikeyReset">
                                <button class="inline-flex text-white bg-purple-700 border-0 py-2 px-6 focus:outline-none hover:bg-purple-800 rounded text-lg" data-tippy-content="Resets your key, making your old one useless.">Reset Key</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="w-2/3 mx-auto bg-white" id="stat">
                <div class="w-full stats">
                    <div class="stat place-items-center place-content-center">
                        <div class="stat-title">Today's Usage</div> 
                        <div class="stat-value purecounter" data-purecounter-duration="1" data-purecounter-end="<?= $dl->countUsesToday($steam->steamid); ?>"></div> 
                    </div> 
                    <div class="stat place-items-center place-content-center">
                        <div class="stat-title">Your Downloaded Songs</div> 
                        <div class="stat-value text-success purecounter" data-purecounter-duration="1" data-purecounter-end="<?= $dl->countAllUserUses($auth->getUserKey($steam->steamid)); ?>"></div> 
                    </div> 
                    <div class="stat place-items-center place-content-center">
                        <div class="stat-title">Total Songs Downloaded</div> 
                        <div class="stat-value text-error purecounter" data-purecounter-duration="2" data-purecounter-end="<?= $dl->countAllUses(); ?>"></div> 
                    </div>
                </div>
                <div class="flex flex-col text-left py-12">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Video
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Key Used
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Timestamp
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach($dl->getKeyUserData($auth->getUserKey($steam->steamid)) as $v){ ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <a href="https://api2.imliamxo.com/cache/<?= $v['vid_id']; ?>" style="color:#5B21B6" target="_blank"><?= $v['vid_title']; ?></a>
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                        <?= $v['vid_id']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"><?= substr($v['requested_by'], 0, 15); ?><span style="color:transparent;text-shadow: 0 0 5px rgba(0,0,0,0.5)" onmousedown="return false;" onselectstart="return false;"><?= substr($v['requested_by'], 15, 48); ?></span></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900" data-tippy-content="<?= $dl->readableTime($v['timestamp']); ?>"><?= $dl->humanTime($v['timestamp']); ?></div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- stats -->
            </section>


            <?php }
                include('includes/footer.php'); 
            ?>
        </div>
        <!-- JavaScript -->
        <script>
            function rainbow(element) {
                const time = 30;

                let data = {
                    chars: element.innerText.split(''),
                    angle: 0,
                }
                data.length = data.chars.length;
                data.shift = 360 / data.length;

                element.innerHTML = data.chars.map(function(char) {
                    return '<span>' + char + '</span>';
                }).join('');

                data.span = element.children;

                setInterval(_ => frame(data), time);
            }

            function frame(data) {
                for (let i = 0; i < data.length; i++) {
                    data.span[i].style.color = 'hsl(' + (data.angle + Math.floor(i * data.shift)) + ', 60%, 70%)';
                    data.span[i].style.textShadow = '0 1px 3px hsl(' + (data.angle + Math.floor(i * data.shift)) +
                        ', 60%, 70%)';
                }

                data.angle++;
            }

            const upgradeElement = document.getElementById('upgrade');
            rainbow(upgradeElement);
        </script>
        <script src="<?= Asset::get('js/vue.min.js'); ?>"></script>
        <script src="<?= Asset::get('js/jquery.min.js'); ?>"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
        <script>
            tippy('[data-tippy-content]');
            function copyToClipboard() {
                var copyText = document.getElementById("apiKey");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);
            }

            $('#apikeyReset').submit(function(event) {
                var ajaxRequest;
                event.preventDefault();
                var values = $(this).serialize();
                ajaxRequest= $.ajax({
                    url: '/api/key/reset',
                    type: 'post',
                    data: "steamid=<?= $steam->steamid; ?>"
                });
                ajaxRequest.done(function (response, textStatus, jqXHR){
                    var keyElement = document.getElementById('apiKey');
                    keyElement.value = response;
            });
            ajaxRequest.fail(function (){
                    alert("We were unable to change your API Key!");
                });
            });
        </script>
        
        <!-- End of JavaScript -->
    </body>
</html>