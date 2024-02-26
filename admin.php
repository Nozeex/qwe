<!doctype html>
<html lang="en">
<head>
<title>Document</title>
           <?php
           session_start();
           require __DIR__ . '\components\settingHead.php';
           require_once 'actions/admin/category/select_cat.php'
           ?>

    <style>
        .counter {
            display: flex;
            align-items: center;
            width: 6vw;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<?php require __DIR__ . '\components\header.php'?>
    <div class="line"></div>
<!--ТУТ ТЕЛО СТРАНИЦЫ-->
<div class="itemSel">
    <ul class="nav nav-pills nav-fill" style="margin-top: 25px; background-color: #FFEEEE">
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/add.php">Добавление</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/delet.php">Удаление</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/redact.php.php">Редактирование</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/category_add.php">Добаить категорию</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/category_del.php">Удалить категорию</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminpanel/category_red.php">Редактировать категорию</a>
        </li>
    </ul>
</div>
<!--НАЧАЛО ПОДВАЛА-->
<?php require __DIR__ . '\components\footer.php'?>
</body>
</html>
