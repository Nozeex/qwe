<?php
require_once __DIR__ . '/../../database/db.php';
session_start();


$tov_name = $_POST['tov_name'];
$tov_price = $_POST['tov_price'];
$tov_desc = $_POST['tov_desc'];
$tov_group = $_POST['tov_group'];
$tov_material = $_POST['tov_material'];
$image = $_FILES['tov_photo'];

// Проверяем наличие данных в $_POST и $_FILES
if (empty($tov_name) || empty($tov_price) || empty($tov_desc) || empty($tov_group)){
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/add.php');
    exit; // Прерываем выполнение скрипта
}

// Проверяем загружен ли файл
if (!isset($image['error']) || $image['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/add.php');
    exit;
}

// Проверяем тип файла и его размер
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$max_file_size = 10 * 1024 * 1024; // 10 MB

if (!in_array($image['type'], $allowed_types) || $image['size'] > $max_file_size) {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/add.php');
    exit;
}


$extension = pathinfo($image['name'], PATHINFO_EXTENSION);
$filename = uniqid() . '.' . $extension;
$path = 'uploads/' . $filename;


if (!move_uploaded_file($image['tmp_name'], "../../" . $path)) {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/add.php');
    exit;
}


$query = $db->prepare("INSERT INTO `tovar`(`name`, `prise`, `desc`, `photo`, `group`, `material`) 
                              VALUES (:name, :prise, :desc, :photo ,:group, :material)");

$result = $query->execute([
    'name' => $tov_name,
    'prise' => $tov_price,
    'desc' => $tov_desc,
    'photo' => $path,
    'group' => $tov_group,
    'material' => $tov_material
]);

if ($result) {
    header("Location: ../../admin.php");
} else {
    die('Ошибка при выполнении SQL запроса');
}
?>




