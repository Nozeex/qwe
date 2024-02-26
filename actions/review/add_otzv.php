<?php
require_once __DIR__ . '/../../database/db.php';
session_start();
$id = $_SESSION['user_login']['user_id'];
var_dump($_SESSION['user_login']);
$tov=$_GET['id'];
$rating=$_POST['rating'];
$feedback=$_POST['feedback'];
$query = $db->prepare("INSERT INTO `otziv`(`Creator`, `Tovar`, `Score`, `Desk`) VALUES (:id, :tov, :rating, :feedback)");
$query->execute([
    'id'=>$id,
    'tov'=>$tov,
    'rating'=>$rating,
    'feedback'=>$feedback,
]);
if (!$query){
    die('ne ale');
} else {
    header('Location:       /');
}