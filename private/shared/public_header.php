<!doctype html>

<html lang="en">
    <head>
        <title>CMS <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?><?php if(isset($preview) && $preview) { echo ' [PREVIEW]'; } ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/p5.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" media="all" href="<?php echo link_to('/css/reset.css'); ?>" />
        <link rel="stylesheet" media="all" href="<?php echo link_to('/css/public.css'); ?>" />
        <link rel="stylesheet" media="all" href="<?php echo link_to('/css/logoCSS.css'); ?>" />
        <script src="<?php echo link_to('/js/public.js'); ?>"></script> 
        <script >
        
        </script> 
    </head>

    <body>

        <header>
            <a href="<?php echo link_to('/index.php'); ?>">
                <img id="logo" src="images/logo.gif" alt="Logo image.">
                <?php// include(SHARED_PATH . '/logo.html');?>
                <!-- <img src="<?php //echo link_to('/index.html'); ?>" width="298" height="71" alt="" /> -->
            </a>
            <span class="underDevelopment">THIS WEBSITE IS UNDER DEVELOPMENT</span>
        </header>
