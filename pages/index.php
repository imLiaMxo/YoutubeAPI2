<?php
    require_once 'helpers/Asset.php';
    require_once 'helpers/Config.php';

    use Helpers\Asset;
    use Helpers\Config;
?>

<!doctype html>
<html lang="en" class="dark">
    <head>
        <meta charset="UTF-8">
        <title><?= Config::get('meta', 'title') ?>: Home</title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <style>
            .dropdown:focus-within .dropdown-menu {
                opacity:1;
                transform: translate(0) scale(1);
                visibility: visible;
            }
        </style>

        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

    </head>
    <body>
        <div class="app bg-white dark:bg-black">
            <?php include('includes/navbar.php') ?>

            <!-- Features -->
            <section class="w-full py-20 bg-gray-100" id="features">
                
                <div class="container max-w-6xl mx-auto">
                    <h2 class="text-4xl font-bold tracking-tight text-center">Our Features</h2>
                    <p class="mt-2 text-lg text-center text-gray-600 ">Check out our list of awesome features below.</p>
                    <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">

                        <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-200 rounded-none rounded-md">
                            <div class="p-3 text-white bg-purple-700 rounded-none rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path><circle cx="6" cy="14" r="3"></circle><path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path></svg>
                            </div>
                            <h4 class="text-xl font-medium text-gray-700">Dashboard</h4>
                            <p class="text-base text-center text-gray-500">All your stuff, in one place!</p>
                        </div>

                        <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-200 rounded-none rounded-md">
                            <div class="p-3 text-white bg-purple-700 rounded-none rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 8a3 3 0 0 1 0 6"></path><path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path><path d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8"></path></svg>
                            </div>
                            <h4 class="text-xl font-medium text-gray-700">Upgrades</h4>
                            <p class="text-base text-center text-gray-500">Upgrade your account for unlimited use!</p>
                        </div>

                        <div class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-200 rounded-none rounded-md">
                            <div class="p-3 text-white bg-purple-700 rounded-none rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline><line x1="12" y1="12" x2="20" y2="7.5"></line><line x1="12" y1="12" x2="12" y2="21"></line><line x1="12" y1="12" x2="4" y2="7.5"></line><line x1="16" y1="5.25" x2="8" y2="9.75"></line></svg>
                            </div>
                            <h4 class="text-xl font-medium text-gray-700">Many Download Sources</h4>
                            <p class="text-base text-center text-gray-500">Download from SoundCloud, Deezer, and many more streaming services!</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Features -->

            <!-- Team -->
            <section class="relative py-20 overflow-hidden bg-white" id="team">
                <span class="absolute bottom-0 left-0"> </span>
                <div class="relative px-16 mx-auto max-w-7xl">
                    <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl text-blue-500">Meet the <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 via-pink-500 to-purple-500">Team</span></h2>
                    <div class="grid w-full grid-cols-2 gap-10 sm:grid-cols-3 lg:grid-cols-4">
                    <?php foreach(Config::get('staff', 'list') as $id => $item) {?>
                        <div class="flex flex-col items-center justify-center col-span-1">
                            <div class="relative p-5">
                                <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-<?= $item['display_color'] ?>"></div>
                                <img class="relative z-20 w-full rounded-full" src="<?= Asset::get("img/staff/{$id}.jpg"); ?>">
                            </div>
                            <div class="mt-3 space-y-2 text-center">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3><?= $item['display_name'] ?></h3>
                                    <p class="text-<?= $item['display_role'] ?>"><?= $item['display_role'] ?></p>
                                </div>
                                <?php if($item['display_name'] == "imLiaMxo"){ ?>
                                        <h4 id="spotifySong"></h4>
                                    <?php } ?>
                                <div class="relative flex items-center justify-center space-x-3">
                                    <a href="https://steamcommunity.com/profiles/<?= $id ?>" class="text-gray-300 hover:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 48 48"><path d="M19.78,31.91c0.5-0.99,0.11-2.19-0.87-2.69l-3.09-1.57C16.45,27.24,17.2,27,18,27 c2.21,0,4,1.79,4,4c0,2.21-1.79,4-4,4c-2.14,0-3.88-1.68-3.99-3.79l3.08,1.57C17.38,32.93,17.69,33,18,33 C18.73,33,19.43,32.6,19.78,31.91z"></path><path fill="#37474f" d="M29,13c-3.31,0-6,2.69-6,6s2.69,6,6,6s6-2.69,6-6S32.31,13,29,13z M29,23c-2.21,0-4-1.79-4-4 s1.79-4,4-4s4,1.79,4,4S31.21,23,29,23z"></path><path fill="#37474f" d="M44,24c0,11.05-8.95,20-20,20C13.69,44,5.21,36.21,4.12,26.19l7.94,4.03 C12.02,30.48,12,30.74,12,31c0,3.31,2.69,6,6,6s6-2.69,6-6c0-0.17-0.01-0.33-0.03-0.5c0.43-0.26,0.88-0.54,1.36-0.83 c1.39-0.83,2.92-1.77,4.15-2.69C33.67,26.73,37,23.26,37,19c0-4.42-3.58-8-8-8s-8,3.58-8,8c0,0.09,0.01,0.18,0.01,0.28 c-0.82,1.14-1.63,2.48-2.36,3.7c-0.47,0.77-0.91,1.5-1.28,2.05c-1.36,0.14-2.57,0.74-3.51,1.63l-9.73-4.95 C5.27,11.74,13.73,4,24,4C35.05,4,44,12.95,44,24z"></path></svg>
                                    </a>
                                    <?php if($item['github_link']){ ?>
                                    <a href="<?= $item['github_link']; ?>" class="text-gray-300 hover:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path></svg>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </section>
            <!-- End of Team -->

            <!-- FAQ -->
            <section class="w-full py-24 mx-auto bg-white" id="faq">
                <div class="max-w-5xl px-12 mx-auto xl:px-12">
                    <h1 class="mb-12 text-xl font-bold text-left md:text-3xl md:text-center">Frequently Asked Questions</h1>
                    <div class="flex items-start justify-start mb-12">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-none w-6 h-6 mr-4 text-gray-700" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="">
                            <p class="mt-0 mb-3 font-semibold text-gray-900">What is this service?</p>
                            <p class="text-gray-600">
                                This Youtube <b>API</b> Service was made in able to download any youtube video and output a JSON response with a streamble MP3 link. Mainly used in codes such as L-Player.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start justify-start mb-12">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-none w-6 h-6 mr-4 text-gray-700" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="mt-0 mb-3 font-semibold text-gray-900">What do I get with a Pro Account?</p>
                            <p class="text-gray-600">
                               With a Pro Account, you will get unlimited access to the API, meaning no daily limits. That means any size video, as many times as you'd like. Best part, you only pay once.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start justify-start mb-12">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-none w-6 h-6 mr-4 text-gray-700" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="mt-0 mb-3 font-semibold text-gray-900">How much is a Pro Account?</p>
                            <p class="text-gray-600">
                                An upgrade to a Pro Account costs $5 USD. You can upgrade your account on your dashboard, or by clicking <a href="/upgrade"><b>here</b></a>.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of FAQ -->

            <?php include('includes/footer.php') ?>
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
        <script src="<?= Asset::get('js/theme.js'); ?>"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script> -->
        <!-- End of JavaScript -->
    </body>
</html>