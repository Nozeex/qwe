<?php
session_start();
require_once __DIR__ . '/../../database/db.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    $del = $db->prepare("SELECT * FROM `tovar` WHERE `id` = :id");
    $del->execute(['id' => $id]);
    $tovar = $del->fetch(PDO::FETCH_ASSOC);

    if ($tovar) {
        $_SESSION['$tov'] = $tovar;
        header('Location: ../../adminpanel/redact.php');
        exit;
    } else {
        $_SESSION['error'] = true;
        header('Location: ../../adminpanel/redact.php');
        exit;
    }
} else {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/redact.php');
    exit;
}
?>
