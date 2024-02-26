<?php
session_start();
require_once __DIR__ . '/../../../database/db.php';


$cat = $db->prepare("SELECT `id`, `type` FROM `tovar_group`");
$cat->execute();
$allCat = $cat->fetchAll(PDO::FETCH_ASSOC);

if ($allCat) {
    $_SESSION['cat'] = $allCat;
} else {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/category_add.php');
    exit;
}

