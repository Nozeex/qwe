<?php
session_start();
require_once __DIR__ . '/../../database/db.php';
$name = $_POST['name'];
$surname = $_POST['surname'];
$milo = $_POST['milo'];
$city = $_POST['city'];
$pass = $_POST['pass'];
$passconf = $_POST['passconf'];
$error = false;
$vhereerrors = [
    'name' => [
        'value' => $name,
        'error' => false
    ],
    'surname' => [
        'value' => $surname,
        'error' => false
    ],
    'milo' => [
        'value' => $milo,
        'error' => false
    ],
    'city' => [
        'value' => $city,
        'error' => false
    ], 'pass' => [
        'error' => false
    ],
];
$search = $db->query("SELECT * FROM `users` WHERE `mail` = '$milo'");
$ser = $search->fetch(PDO::FETCH_ASSOC);

if (empty($name) || empty($surname)) {
    $vhereerrors['name']['error'] = true;
    $error = true;
}
if (empty($surname)) {
    $vhereerrors['surname']['error'] = true;
    $error = true;
}
if (empty($milo) || !filter_var($milo, FILTER_VALIDATE_EMAIL)) {
    $vhereerrors['milo']['error'] = true;
    $error = true;
} else{
    if ($ser){
        $vhereerrors['milo']['error'] = true;
        $error = true;
    }
}
if (empty($city)) {
    $vhereerrors['city']['error'] = true;
    $error = true;
}
if (empty($pass) || empty($passconf)) {
    $vhereerrors['pass']['error'] = true;
    $error = true;
} else {
    if (empty($pass) !== empty($passconf)) {
        $vhereerrors['pass']['error'] = true;
        $error = true;
    }
}
if ($error === true) {
    $_SESSION['errors'] = $vhereerrors;
    header('Location: /auth.php');
    die();
}
$query = $db->prepare("INSERT INTO `users`(`name`, `surname`, `mail`, `city`, `password`, `group_id`) VALUES (:name, :sur, :mail, :city, :pass, :group)");
$query->execute([
    'name'=>$name,
    'sur'=>$surname,
    'mail'=>$milo,
    'city'=>$city,
    'pass'=>$pass,
    'group'=>2
]);
if (!$query){
    die();
} else {
    header('Location: /avtot.php');
}


