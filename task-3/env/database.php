<?php

$host = "localhost";
$user = "root";
$password = "";
$databaseName = "shop_2";


try {
    $connect = mysqli_connect($host, $user, $password, $databaseName);
} catch (Exception $e) {
    echo $e->getMessage();
}
