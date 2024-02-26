<?php
// Проверяем, была ли отправлена форма
require_once __DIR__ . '/../../database/db.php';
session_start();

// Получаем данные из формы
$priceFrom = $_POST['priceFrom'] ?? null;
$priceTo = $_POST['priceTo'] ?? null;
$productGroup = $_POST['productGroup'] ?? null;
$material = $_POST['material'] ?? null;

// Создаем SQL запрос
$sql = "SELECT `id`, `name`, `prise`, `desc`, `photo`, `group`, `material` FROM `tovar` WHERE 1=1";

// Создаем массив для параметров запроса
$params = [];

// Добавляем условия в запрос, если они заданы
if (!empty($priceFrom)) {
    $sql .= " AND `prise` >= ?";
    $params[] = $priceFrom;
}
if (!empty($priceTo)) {
    $sql .= " AND `prise` <= ?";
    $params[] = $priceTo;
}
if (!empty($productGroup)) {
    $sql .= " AND `group` = ?";
    $params[] = $productGroup;
}
if (!empty($material)) {
    $sql .= " AND `material` LIKE ?";
    $params[] = '%' . $material . '%';
}

// Подготавливаем запрос
$stmt = $db->prepare($sql);

// Выполняем запрос с параметрами
$stmt->execute($params);

// Получаем результат запроса
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Выводим результат (например, в виде HTML таблицы)

$_SESSION['result']=$result;


header('location: ../../pageTov.php');
?>
