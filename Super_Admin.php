<?php
//error_reporting(0);
require 'DBcon.php';
class Super_Admin {
    
    public function __construct() {
        $db_connect = new Db_Connect();
    }
       
   public function logout() {
        unset($_SESSION['login_id']);
        unset($_SESSION['login_access']);
		unset($_SESSION['user_type']);
        header('Location:index.php');
    }  	    
}
