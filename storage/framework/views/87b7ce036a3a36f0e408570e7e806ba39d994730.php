<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Mybizna Erp')); ?></title>

    <script>
        var base_url = '<?php echo e(url("/")); ?>';

        function __(title, select){
            return title;
        }

    </script>

    <script defer="defer" src="/tinymce/tinymce.min.js?<?php echo e(rand(10000,50000)); ?>"></script>
    <script defer="defer" src="/live/js/app.js?<?php echo e(rand(10000,50000)); ?>"></script>
    <link href="/live/css/app.css?<?php echo e(rand(10000,50000)); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            important: true,
        }
    </script>

    <!--
        <link href="https://mybizna.github.io/bootstrapwind/dist/output.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/webfontloader.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/backend-dashboard.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/general-components.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.comreleases/v5.0.13/css/all.css" rel="stylesheet">


    <style>
        /* Center the loader */
        #loader {
            margin: 0 auto;
            width: 120px;
            height: 120px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes  animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #loaderDiv {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="loaderDiv" class="animate-bottom my-5">
            <h2 class="my-3">Loading!....</h2>
            <p class="mb-5">The system require's javascript.</p>
        </div>
        <div>
            <div id="loader"></div>
        </div>
    </div>
</body>

</html>
<?php /**PATH /var/www/html/php/laravel/laravelerp/resources/views/layouts/app.blade.php ENDPATH**/ ?>