<?php

    function link_to($script_path) {
        // add the leading '/' if not present
        if($script_path[0] != '/') {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    function h_u($string="") {
        return htmlspecialchars(urlencode($string));
    }

    function h($string="") {
        return htmlspecialchars($string);
    }

    function redirect_to($location) {
        header("Location: " . link_to($location));
    exit;
    }

    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    // PHP on Windows does not have a money_format() function.
    // This is a super-simple replacement.
    if(!function_exists('money_format')) {
        function money_format($format, $number) {
            return '$' . number_format($number, 2);
        }
    }

?>
