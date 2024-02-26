<?php
require_once __DIR__ . '/../../../database/db.php';
$newType = $_POST['new_cat'];

// Подготавливаем запрос на добавление записи
$insertCat = $db->prepare("INSERT INTO `tovar_group` (`type`) VALUES (:type)");

// Привязываем параметры и выполняем запрос
$insertCat->bindParam(':type', $newType, PDO::PARAM_STR);
$insertCat->execute();

// Проверяем успешность операции добавления
if ($insertCat->rowCount() > 0) {
    header('Location: ../../../adminpanel/category_del.php');
} else {
    echo "Ошибка при добавлении записи.";
}
