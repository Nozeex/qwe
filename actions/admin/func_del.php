<?php
session_start();
require_once __DIR__ . '/../../database/db.php';

// Проверяем наличие ID товара
if (!isset($_POST['id'])) {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/delet.php');
    exit;
}

$id = $_POST['id'];

// Получаем информацию о товаре
$del = $db->prepare("SELECT * FROM `tovar` WHERE `id` = :id");
$del->execute(['id' => $id]);
$tovar = $del->fetch(PDO::FETCH_ASSOC);

if ($tovar) {
    // Удаляем фото товара с сервера
    $photo_path = '../../' . $tovar['photo'];
    if (file_exists($photo_path)) {
        unlink($photo_path);
    }

    // Удаляем запись о товаре из базы данных
    $delete_query = $db->prepare("DELETE FROM `tovar` WHERE `id` = :id");
    $result = $delete_query->execute(['id' => $id]);

    if ($result) {
        header('Location: ../../adminpanel/delet.php');
        exit;
    } else {
        $_SESSION['error'] = true;
        header('Location: ../../adminpanel/delet.php');
        exit;
    }
} else {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/delet.php');
    exit;
}
?>
