<?php
$host = 'localhost';
$usermane = 'root';
$password = 'mysqladmin123$$';
$db = 'mini_store';
$port = 3307;                       // !! port = 3307 diff. from the default one

try {
    $connection = new PDO("mysql:host=$host;port=$port;dbname=$db", $usermane, $password);
} catch (PDOException $e) {
    echo "Connection failed";
    die();
}
