<?php

session_start();

$user_id = isset($_SESSION['user_login']['user_id']) ? $_SESSION['user_login']['user_id'] : null;

function addToCart($user_id, $product_id) {
    if (!isset($_SESSION['cart'][$user_id])) {
        $_SESSION['cart'][$user_id] = array();
    }

    if (isset($_SESSION['cart'][$user_id][$product_id])) {
        $_SESSION['cart'][$user_id][$product_id]++;
    } else {
        $_SESSION['cart'][$user_id][$product_id] = 1;
    }
}

if (!empty($user_id) && isset($_GET['id'])) {
    $product_id = $_GET['id'];
    addToCart($user_id, $product_id);
}
var_dump($_GET['id']);
var_dump($_SESSION['cart']);

header('Location: /corzina.php');
?>
