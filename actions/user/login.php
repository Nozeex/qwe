<?php
session_start();
require_once __DIR__ . '/../../database/db.php';
$milo = $_POST['milo'];
$pass = $_POST['pass'];
$db = new MockPDO();
$search = $db->prepare("SELECT * FROM `users` WHERE `mail` = :milo");
$search -> execute([
    'milo'=>$milo
]);
$ser = $search->fetch(PDO::FETCH_ASSOC);
if ($ser) {
    $milo1 = $ser['mail'];
    $pass1 = $ser['password'];
    if ($milo == $milo1 && $pass == $pass1) {
        $_SESSION['user_login'] = [
            'user_id' => $ser['id'],
            'user_group' => $ser['group_id']
        ];
        header('Location: /index.php');
    } else {
        $_SESSION['error'] = true;
        header('Location: /avtot.php');
        die();
    }
} else {
    $_SESSION['error'] = true;
    header('Location: /avtot.php');
    die();
};
?>
