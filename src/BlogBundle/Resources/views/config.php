<?php
// info de connection à la BDD
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'coco');
define('DB_PASSWORD', 'coco');
define('DB_NAME', 'php_tp');
 
// connection a BDD
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier la connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>