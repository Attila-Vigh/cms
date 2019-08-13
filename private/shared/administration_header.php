<?php if(!isset($page_title)) { $page_title = 'Administration Area'; } ?>

<!doctype html>

<html lang="en">
    <head>
        <title><?php echo h($page_title); ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="<?php echo link_to('/css/login.css'); ?>" />
        <link rel="stylesheet" media="all" href="<?php echo link_to('/css/administration.css'); ?>" />
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <div class="wrapper"
        <header>
            <h1>Administration Area</h1>
        </header>

        <navigation>
            <ul>
                <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
                <li><a class="menu_btn" href="<?php echo link_to('/administration/index.php'); ?>">Menu</a></li>
                <li><a class="logout_btn" href="<?php echo link_to('/administration/logout.php'); ?>">Logout</a></li>
            </ul>
        </navigation>

<?php echo display_session_message(); ?>
