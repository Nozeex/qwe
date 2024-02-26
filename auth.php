<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <?php require __DIR__ . '\components\settingHead.php';
    session_start()
    ?>

</head>
<body>
<!--ТУТ ХЕДЕР-->
<?php require __DIR__ . '\components\header.php' ?>
<div class="line"></div>
<!--ТУТ ТЕЛО СТРАНИЦЫ-->
<div style="margin-top: 2vw; margin-left: 2vw; margin-right: 2vw">
    <?php
    if (isset($_SESSION['errors'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            Проверьте правильность введенных данных
        </div>
        <?php
        $field = $_SESSION['errors'];
    }
    ?>
    <form class="row g-3 needs-validation" action='actions\user\reg.php' method=post novalidate
          style="font-size: 1.5vw">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Имя</label>
            <input type="text" class="form-control <?= $field['name']['error'] ?? '' ? 'is-invalid' : ''; ?>"
                   value="<?= $field['name']['value'] ?? '' ?>" id="validationCustom01" name='name' required>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Фамилия</label>
            <input type="text" class="form-control <?= $field['surname']['error'] ?? '' ? 'is-invalid' : ''; ?>"
                   value="<?= $field['surname']['value'] ?? '' ?>" id="validationCustom02" name='surname' required>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Почта </label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control <?= $field['milo']['error'] ?? '' ? 'is-invalid' : ''; ?> "
                       value="<?= $field['milo']['value'] ?? '' ?>" id="validationCustomUsername" name='milo'
                       aria-describedby="inputGroupPrepend" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Город</label>
            <input type="text" class="form-control <?= $field['city']['error'] ?? '' ? 'is-invalid' : ''; ?> "
                   value="<?= $field['city']['value'] ?? '' ?>" id="validationCustom03" name='city' required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Пароль</label>
            <input type="text" class="form-control <?= $field['pass']['error'] ?? '' ? 'is-invalid' : ''; ?> "
                   name='pass' id="validationCustom05" required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Повторите пароль</label>
            <input type="text" class="form-control <?= $field['pass']['error'] ?? '' ? 'is-invalid' : ''; ?>"
                   name='passconf' id="validationCustom05" required>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit"
                    style="background-color: #FFEEEE; color: black; border-color: #FFEEEE">Зарегистрироваться
            </button>
        </div>
        <div>
            <a href="avtot.php" style="text-decoration: none; color: black; font-size: 1vw">У меня уже есть аккаунт</a>
        </div>
    </form>
</div>

<?php require __DIR__ . '\components\footer.php';
unset($_SESSION['errors'])
?>
</body>
</html>
