<?php
session_start();

$product_id = $_POST['selected_products'];

$id =  $_SESSION['user_login']['user_id'];

if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
}
header('Location: /corzina.php');