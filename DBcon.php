<?php
//error_reporting(0);
//normal procedure
$servername = "sql201.epizy.com";
$username = "epiz_26979386";
$password = "lms1ZEDLzpH";
$dbname="epiz_26979386_lmd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>

<?php 
//oop procedure
class Db_Connect {

    public function __construct() 
	{
        $hostname = 'sql201.epizy.com';
        $username = 'epiz_26979386';
        $password = 'lms1ZEDLzpH';
        $dbname = 'epiz_26979386_lmd';
        $conn = mysqli_connect($hostname, $username, $password);
        mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
    }
}
?>


