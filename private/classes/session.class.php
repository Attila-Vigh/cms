<?php

class Session {

    public  $username;
    private $admin_id;
    private $last_login;

    public const MAX_LOGIN_AGE = 60*60*24; // 1 day

    public function __construct() {
        session_start();
        $this->check_stored_login();
    }   

  public function login($admin) {
    if($admin) {
        session_regenerate_id(); // prevent session fixation attacks
        $this->admin_id = $_SESSION['admin_id'] = $admin->id;
        $this->username = $_SESSION['username'] = $admin->username;
        $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

    public function is_logged_in() {
        return isset($this->admin_id) && $this->last_login_is_recent();
    }

    private function last_login_is_recent() {
            if(!isset($this->last_login)) {
            return false;
        } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
            return false;
        } else {
            return true;
        }
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['username']);
        unset($_SESSION['last_login']);
        unset($this->admin_id);
        unset($this->username);
        unset($this->last_login);
        return true;
    }

    private function check_stored_login() {
        if(isset($_SESSION['admin_id'])) {
            $this->admin_id = $_SESSION['admin_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
        }
    }

    public function message($msg="") {
        if(!empty($msg)) {
            // Then this is a "set" message
            $_SESSION['message'] = $msg;
            return true;
        } else {
            // Then this is a "get" message
            return $_SESSION['message'] ?? '';
        }
    }

    public function clear_message() {
        unset($_SESSION['message']);
    }
}

?>
