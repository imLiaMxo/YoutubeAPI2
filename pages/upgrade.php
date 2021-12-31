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
        <title><?= Config::get('meta', 'title') ?>: Upgrade</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="og:title" content="<?= Config::get('meta', 'title') ?>: Upgrade"/>
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
            <?php include('includes/navbar.php') ?>

    
            <!-- Section 1 -->
            <section class="py-20 bg-gray-100">
                <div class="px-10 mx-auto max-w-7xl xl:px-16">
                    <div class="max-w-3xl mx-auto mb-12 text-center lg:mb-20">
                        <h2 class="mt-3 mb-10 text-4xl font-bold font-heading">Account Upgrade</h2>
                    </div>
                    <div class="px-6 py-6 mb-6 lg:pl-12 lg:pr-6 bg-gray-50 rounded-xl">
                        <div class="flex flex-col justify-between lg:flex-row">
                            <div class="w-full px-4 mb-4 lg:w-7/12 xl:w-8/12 lg:mb-0">
                                <div class="max-w-xl pt-4 lg:pt-6">
                                    <div class="max-w-md mb-10">
                                        <h2 class="text-3xl font-semibold md:text-4xl font-heading">Pro Account</h2>
                                    </div>
                                    <p class="mb-10 text-xl text-gray-500">Upgrading your account to a Pro Account will give you a few perks which can be quite useful.</p>
                                    <ul class="flex flex-wrap text-base text-left lg:text-lg">
                                        <li class="flex items-center w-full mb-6 sm:w-1/2">
                                            <svg class="mr-2 text-pink-400 w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <p class="font-medium">No Daily Limits</p>
                                        </li>
                                        <li class="flex items-center w-full mb-6 sm:w-1/2">
                                            <svg class="mr-2 text-pink-400 w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <p class="font-medium">No File Size Restrictions</p>
                                        </li>
                                        <li class="flex items-center w-full mb-6 sm:w-1/2">
                                            <svg class="mr-2 text-pink-400 w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <p class="font-medium">Fast Track Support</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full px-4 lg:w-5/12 2xl:w-4/12">
                                <div class="h-full p-12 text-center bg-white rounded-xl">
                                    <span class="inline-block px-3 py-1 mb-4 rounded bg-pink-50">
                                        <h3 class="text-xs font-semibold text-pink-500">Pro Features</h3>
                                    </span>
                                    <p class="mb-6 text-gray-500 lg:mb-12">Gain access to a Pro and get the most of your API key.</p>
                                    <div class="flex justify-center mb-12">
                                        <span class="self-start inline-block mr-1 text-xl font-semibold text-gray-500">$</span>
                                        <p class="self-end text-5xl font-semibold font-heading">5<span class="ml-1 text-sm">/ lifetime</span></p>
                                    </div>
                                    <?php if($steam->loggedIn()){ ?>
                                        <div id="paypal-button-container"></div>
                                    <?php } else { ?>
                                        <a href="<?= $steam->loginUrl(); ?>" class="block py-4 mb-4 text-sm font-medium leading-normal text-center text-white transition duration-200 bg-pink-400 rounded hover:bg-pink-300">Login to Upgrade</a>
                                    <?php } ?>
                                    <p class="text-xs text-gray-500">No contract. One payment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
    <?php if ($steam->loggedIn()) { ?>

    <script src="https://www.paypal.com/sdk/js?client-id=PAYPAL_CLIENT_ID&currency=USD"></script>
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            style: {
                color:  'blue',
                shape:  'pill',
                label:  'pay',
                height: 40
            },

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.50'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                   // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<a href="#" class="block py-4 mb-4 text-sm font-medium leading-normal text-center text-white transition duration-200 bg-green-700 rounded">Payment Success!</a>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');
    </script>
    <?php } ?>
    <script src="<?= Asset::get('js/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <!-- End of JavaScript -->
    </body>
</html>