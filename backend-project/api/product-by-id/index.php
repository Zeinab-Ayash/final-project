<?php

include '../../connection.php';
include '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    respond(null, 'failed', 'wrong method');
    die;
}

$data = $_GET;


if (!isset($data['id']) || !is_numeric($data['id'])) {
    respond(null, 'failed', 'product id is required as int');
    die;
}
$productId = intval($data['id']);

try{
     $query = $connection->prepare("SELECT * FROM products WHERE id=?");
     $query->execute([$productId]);
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
    
catch (PDOException $e) {
    respond(null, 'failed', 'An Error occured');
    die;
}

if (!$result) {
    respond(null, 'failed', 'product not found');
    die;
}

respond($result, 'success', 'product found');