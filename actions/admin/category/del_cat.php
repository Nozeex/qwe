<?php
require_once __DIR__ . '/../../../database/db.php';
$idToDelete = $_POST['id']; // ID записи, которую нужно удалить

// Подготавливаем запрос на удаление записи
$deleteCat = $db->prepare("DELETE FROM `tovar_group` WHERE `id` = :id");

// Привязываем параметр и выполняем запрос
$deleteCat->bindParam(':id', $idToDelete, PDO::PARAM_INT);
$deleteCat->execute();

// Проверяем успешность операции удаления
if ($deleteCat->rowCount() > 0) {
    header('Location: ../../../adminpanel/category_del.php');
} else {
    echo "Ошибка при удалении записи.";
}
