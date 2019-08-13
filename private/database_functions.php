<?php

    function db_connect() {
        $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if($connection->connect_errno) {
            $msg = "Database connection failed: " . $connection->connect_error . " (" . $connection->connect_errno . ")";
            exit($msg);
        }
        return $connection;
    }

    function db_disconnect($connection) {
        if(isset($connection)) {
            $connection->close();
        }
    }

?>
