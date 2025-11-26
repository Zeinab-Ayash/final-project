<?php

include '../../connection.php';
include '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    respond(null, 'failed', 'wrong method');
    die;
}

$data = $_GET;


if (!isset($data['product_id']) || !is_numeric($data['product_id'])) {
    respond(null, 'failed', 'product id is required as int');
    die;
}
$productId = intval($data['product_id']);

try{
     $query = $connection->prepare("SELECT * FROM orders WHERE product_id=? Order By id desc Limit 10");
     $query->execute([$productId]);
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
    
catch (PDOException $e) {
    respond(null, 'failed', 'An Error occured');
    die;
}

if (!$result) {
    respond(null, 'failed', 'no orders found for this product');
    die;
}

respond($result, 'success', 'orders found');