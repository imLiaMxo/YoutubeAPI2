<?php
    require_once 'vendor/SteamAuth/SteamAuth.php';
    require_once 'controllers/AvatarController.php';
    require_once 'controllers/AuthController.php';
    require_once 'helpers/Config.php';

    use Vendor\SteamAuth\SteamAuth;
    use Helpers\Config;
    use Controllers\AuthController;
    use Controllers\AvatarController as AC;

    $steam = new SteamAuth();
    $auth = new AuthController();
?>

<!-- Nav Bar -->
<section class="w-full px-8 text-gray-700 bg-white dark:bg-gray-900 dark:text-white" id="navbar">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="#_" class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">YouTube <span class="text-indigo-600">API</span></span>
            </a>
            <nav class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="/" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <a href="/#features" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Features</a>
                <a href="/#faq" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">FAQ</a>
                <a href="/upgrade" id="upgrade" class="mr-5 font-medium leading-6 bg-clip-text !text-transparent bg-gradient-to-r from-red-500 to-indigo-500">Upgrade</a>
            </nav>
        </div>

        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
        <?php if (!$steam->loggedIn()) { ?>
                <a href="<?= $steam->loginUrl(); ?>"><img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png"></a>
        <?php } else {
            if(!$auth->userValid($steam->steamid)){
                $auth->insertUser($steam->steamid, $steam->personaname);
                AC::getIdvAvatar($steam->steamid);
            }
            ?>
            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
            <div class="relative inline-block text-left dropdown">
                <span class="rounded-md shadow-sm">
                    <button
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800"
                        type="button"
                        aria-haspopup="true"
                        aria-expanded="true"
                        aria-controls="headlessui-menu-items-117"
                    >
                        <span><?= $steam->personaname ?></span>
                        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </span>
                <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                    <div
                        class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1"
                        id="headlessui-menu-items-117"
                        role="menu"
                    >
                        <div class="px-4 py-3">
                            <p class="text-sm leading-5">Signed in as</p>
                            <p class="text-sm font-medium leading-5 text-gray-900 truncate"><?= $steam->personaname ?></p>
                        </div>
                        <div class="py-1">
                            <a href="/dashboard" tabindex="0" class="text-gray-700 flex justify-between w-full hover:bg-indigo-600 hover:text-white px-4 py-2 text-sm leading-5 text-left" role="menuitem">Dashboard</a>
                            <a href="/support" tabindex="1" class="text-gray-700 flex justify-between w-full hover:bg-indigo-600 hover:text-white px-4 py-2 text-sm leading-5 text-left" role="menuitem">Support</a>
                            <div class="py-1">
                            <form action="/logout" method="post">
                                <button name="logout" type="submit" tabindex="3" class="text-gray-700 flex justify-between w-full hover:bg-indigo-600 hover:text-white px-4 py-2 text-sm leading-5 text-left" role="menuitem">Logout</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </div>
</section>
<!-- Nav Bar End -->