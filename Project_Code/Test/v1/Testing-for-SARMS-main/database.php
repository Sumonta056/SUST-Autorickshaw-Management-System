<?php

$host = "localhost";
$dbname = "id20851078_testdb";
$username = "id20851078_promi563856";
$password = "amarnamMITA@38";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;