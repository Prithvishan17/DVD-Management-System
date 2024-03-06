<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'lrgs.ftsm.ukm.my');
define('DB_USERNAME', 'a181068');
define('DB_PASSWORD', 'littleyellowbird');
define('DB_NAME', 'a181068');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>