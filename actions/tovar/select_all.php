<?php
require_once __DIR__ . '/../../database/db.php';
session_start();
$forHud = $db->prepare("SELECT * FROM `tovar` WHERE `group` = :groupid");
$forHud->execute(['groupid' => 1]);
$toHud = $forHud->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['toHud'] = $toHud;
$forGame = $db->prepare("SELECT * FROM `tovar` WHERE `group` = :groupid1");
$forGame->execute(['groupid1' => 2]);
$toGame = $forGame->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['toGame'] = $toGame;






