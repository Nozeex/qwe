<?php

session_start();

$product_id = $_POST['selected_products'];

$id =  $_SESSION['user_login']['user_id'];

if (isset($_SESSION['cart'][$id][$product_id])) {
    if ($_SESSION['cart'][$id][$product_id] > 1) {
        $_SESSION['cart'][$id][$product_id]--;
    } else {
        unset($_SESSION['cart'][$id][$product_id]);
    }
}
//
//
//session_start();
//$id =  $_SESSION['user_login']['user_id'];
//
//    if(isset($_POST['selected_products'])) {
//        foreach($_POST['selected_products'] as $product_id) {
//            var_dump($product_id);
//            if (isset($_SESSION['cart'][$id][$product_id])) {
//                unset($_SESSION['cart'][$id][$product_id]);
//            }
//        }
//    }
   header('Location: /corzina.php');
    exit();

?>

