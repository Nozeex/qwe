<?php
session_start();
require_once __DIR__ . '/../../database/db.php';
if (isset($_SESSION['user_login']['user_id']) && isset($_SESSION['cart'])) {
    $id = $_SESSION['user_login']['user_id'];

    if (!empty($_SESSION['cart'][$id])) {
        $idArray = array_keys($_SESSION['cart'][$id]);
        $placeholders = implode(',', array_fill(0, count($idArray), '?'));
        $forCort = $db->prepare("SELECT * FROM `tovar` WHERE id IN ($placeholders)");
        $forCort->execute($idArray);
        $toCort = $forCort->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['tov_in_corz'] = $toCort;
    }
}
