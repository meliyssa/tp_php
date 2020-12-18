<?php

DEFINE('DB_USER','coco');
DEFINE('DB_PASSWORD','coco');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','php_tp');

$con = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
    or die('Could not connect to MySQL:' .
    mysqli_connect_error());

    $id = $_REQUEST['id'];
    $query = "DELETE FROM article WHERE id='".$id."'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    header('Location: admin.php');
?>