<?php

include '../../connection.php';
include '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    respond(null, 'failed', 'wrong method');
    die;
}

$data = $_POST;


if (!isset($data['product_id']) || !is_numeric($data['product_id'])) {
    respond(null, 'failed', 'product id is required as int');
    die;
}
$productId = intval($data['product_id']);

try{
     $query1 = $connection->prepare("SELECT * FROM products WHERE id=?");
     $query1->execute([$productId]);
     $result1 = $query1->fetchAll(PDO::FETCH_ASSOC);

     if (!$result1) {
    respond(null, 'failed', 'no product found');
    die;
}

     $query = $connection->prepare("INSERT INTO orders (product_id) VALUES (?)");
        $result = $query->execute([$productId]);
    }

    catch (PDOException $e) {
    respond(null, 'failed', 'An Error occured');
    die;
}

if (!$result) {
    respond(null, 'failed', 'something went wrong');
    die;
}

respond(true, 'success', 'The order is created successfully');
