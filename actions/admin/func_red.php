<?php
session_start();
require_once __DIR__ . '/../../database/db.php';

$id = $_SESSION['$tov']['id'];
$photo = $_SESSION['$tov']['photo'];

$second_name = $_POST['name'];
$second_prise = $_POST['price'];
$second_desc = $_POST['desc'];
$second_group = $_POST['group'];
$second_material = $_POST['material'];

if (
    isset($second_name, $second_prise, $second_desc, $second_group) &&
    !empty($second_name) && !empty($second_prise) && !empty($second_desc) && !empty($second_group)
) {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $second_photo = $_FILES['photo'];
        $path = 'uploads/' . $second_photo['name'];
        move_uploaded_file($second_photo['tmp_name'], "../../" . $path);
    } else {
        $path = $photo;
    }

    $photo_path = '../../' . $photo;
    if (file_exists($photo_path)) {
        unlink($photo_path);
    }

    $query = $db->prepare("UPDATE `tovar` SET `name`=:name, `prise`=:prise, `desc`=:desc, `photo`=:photo, `group`=:group, `material`=:material WHERE `id` = :id");
    $result = $query->execute([
        'name' => $second_name,
        'prise' => $second_prise,
        'desc' => $second_desc,
        'photo' => $path,
        'group' => $second_group,
        'material' => $second_material,
        'id' => $id
    ]);

    if ($result) {
        header("Location: ../../adminpanel/redact.php");
        exit;
    } else {
        die('Ошибка при выполнении SQL запроса');
    }
} else {
    $_SESSION['error'] = true;
    header('Location: ../../adminpanel/redact.php');
    exit;
}
?>
