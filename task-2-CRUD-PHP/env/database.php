<?php


// connecting our database
$host = "localhost";
$user = "root";
$password = "";
$databaseName = "shop";

try {
    $connect = mysqli_connect($host, $user, $password, $databaseName);
} catch (Exception $e) {
    echo $e->getMessage();
}
