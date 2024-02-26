<?php
require_once __DIR__ . '/../../../database/db.php';
$newType = $_POST['new'];
$idToUpdate = $_POST['id']; // ID записи, которую нужно изменить

// Подготавливаем запрос на редактирование записи
$updateCat = $db->prepare("UPDATE `tovar_group` SET `type` = :type WHERE `id` = :id");

// Привязываем параметры и выполняем запрос
$updateCat->bindParam(':type', $newType, PDO::PARAM_STR);
$updateCat->bindParam(':id', $idToUpdate, PDO::PARAM_INT);
$updateCat->execute();

// Проверяем успешность операции редактирования
if ($updateCat->rowCount() > 0) {
    header('Location: ../../../adminpanel/category_red.php');
} else {
    echo "Ошибка при редактировании записи.";
}
