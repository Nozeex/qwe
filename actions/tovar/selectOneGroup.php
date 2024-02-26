<?php
session_start();
require_once __DIR__ . '/../../database/db.php';
$id = $_GET['id'];

$OneGroup = $db->prepare("SELECT * FROM `tovar` WHERE `group` = :groupid1");
$OneGroup->execute(['groupid1' => $id]);
$Group = $OneGroup->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['Group'] = $Group;

header('location: ../../pageTov.php');