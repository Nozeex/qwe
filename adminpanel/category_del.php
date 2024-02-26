<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <?php
    require __DIR__ . '/..\components\settingHead.php';
    require __DIR__ . '/../actions/admin/category/select_cat.php';

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
<!--ТУТ ХЕДЕР-->
<?php require __DIR__ . '/..\components\header.php'?>
<div class="line"></div>
<!--ТУТ ТЕЛО СТРАНИЦЫ-->
<div class="itemSel">
    <ul class="nav nav-pills nav-fill" style="margin-top: 25px; background-color: #FFEEEE">
        <li class="nav-item">
            <a class="nav-link" href="add.php">Добавление</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="delet.php">Удаление</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="redact.php">Редактирование</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category_add.php">Добаить категорию</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category_del.php">Удалить категорию</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category_red.php">Редактировать категорию</a>
        </li>
    </ul>
</div>

<div style="margin-left: 2vw; margin-right: 2vw; margin-top: 2vw">
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            Данный товар не существует
        </div>
        <?php
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['cat'])) {
        $cat = $_SESSION['cat'];
        unset($_SESSION['cat']);
        foreach ($cat as $c) {
            ?>
            <ul class="list-group">
                <li class="list-group-item  justify-content-between " style="max-width: 15vw">
                    <?=$c['type']?>
                    <span class="badge  rounded-pill mr-auto" style="background-color: #FFEEEE; color: black; border-color: #FFEEEE;">
                        <?=$c['id']?>
                    </span>
                </li>
            </ul>

            <?php
        }}
    ?>

    <form class="row g-3" action="/actions/admin/category/del_cat.php" method="post">
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Идентификатор</label>
            <input type="text" class="form-control" name="id" id="validationServer01" >
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                    <label class="form-check-label" for="invalidCheck3">
                        Подтвердить
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" style="background-color: #FFEEEE; color: black; border-color: #FFEEEE">Удалить</button>
            </div>
    </form>
</div>

<!--НАЧАЛО ПОДВАЛА-->
<?php require __DIR__ . '/..\components\footer.php'?>
</body>
</html>

