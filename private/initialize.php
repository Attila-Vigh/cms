<?php

    ob_start(); // turn on output buffering

    // Assign file paths to PHP constants
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    // Assign the root URL to a PHP constant
    // hard coded root
    // define("WWW_ROOT", '/public');
    // define("WWW_ROOT", '');
    // Can dynamically find everything in URL up to "/public"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    require_once('functions.php');
    require_once('error_functions.php');
    require_once('db_authentification.php');
    require_once('database_functions.php');
    require_once('validation_functions.php');

    // Load class definitions manually

    // -> Individually
    // require_once('classes/bicycle.class.php');

    // -> All classes in directory
    foreach(glob('classes/*.class.php') as $file) {
        require_once($file);
    }

    // Autoload class definitions
    function my_autoload($class) {
        if(preg_match('/\A\w+\Z/', $class)) {
           include('classes/' . $class . '.class.php');
        }
    }
    spl_autoload_register('my_autoload');

    $database = db_connect();
    DatabaseObject::set_database($database);

    $session = new Session;

?>
