<?php
session_start();
require_once __DIR__ . '/../../database/db.php';
    $email = $_POST['mail'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password === $confirm_password) {
        $search_user = $db->prepare("SELECT * FROM `users` WHERE `mail` = :email AND `name` = :name AND `surname` = :surname");
        $search_user->execute(['email' => $email, 'name' => $name, 'surname' => $surname]);
        $user = $search_user->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $update_password = $db->prepare("UPDATE `users` SET `password` = :password WHERE `mail` = :email");
            $update_password->execute(['password' => $confirm_password, 'email' => $email]);
            header('Location: ../../avtot.php');
            exit('d');
        } else {
            $_SESSION['error'] = "Неверно указаны данные";
            header('Location: /changePassword.php');
            exit('d');
        }
    } else {
        $_SESSION['error'] = "Пароли не совпали";
        header('Location: /changePassword.php');
        exit('d');
    }

