<?php
require_once __DIR__ . '/../../database/db.php';
session_start();
$searchTerm = $_GET['search'];
$sql = "SELECT * FROM `tovar` WHERE `name` LIKE :searchTerm OR `desc` LIKE :searchTerm";
$stmt = $db->prepare($sql);
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Если есть результаты, выводим их
if ($stmt->rowCount() > 0) {
$_SESSION['sear_tov']=$results;
    header('Location: ../../searchPage.php');
} else {
    $_SESSION['error']=true;
    header('Location: ../../searchPage.php');
}
