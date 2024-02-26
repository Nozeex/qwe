<?php
require_once __DIR__ . '/database/db.php';
session_start();
$id_tov =$_GET['id'];
$query = $db->prepare("SELECT * FROM `otziv` WHERE `Tovar`= :id");
$query->execute([
    'id' => $id_tov,
]);
$all_query = $query->fetchAll(PDO::FETCH_ASSOC);
if (!$query) {
    die('ne ale');
} else{

}