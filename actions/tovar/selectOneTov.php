<?php
require_once __DIR__ . '/../../database/db.php';
session_start();
$id=$_GET['id'];
$tovar = $db->prepare("SELECT * FROM `tovar` WHERE `id` = :id");
$tovar->execute(['id' => $id]);
$oneTovar = $tovar->fetch(PDO::FETCH_ASSOC);
$_SESSION['tov'] = $oneTovar;
if ($tovar){
    header('Location: ../../kartatovara.php?id=' . $id);
} else {
    die('нет такого товара');
}