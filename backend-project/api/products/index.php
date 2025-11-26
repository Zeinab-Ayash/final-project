<?php

include '../../connection.php';
include '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    respond(null, 'failed', 'wrong method');
    die;
}

try {

    $query = $connection->query("SELECT * FROM products");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    respond(null, 'failed', 'An error occured');
    die;
}

respond($result);