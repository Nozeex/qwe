<!doctype html>
<html lang="en">
<head>
<title>Document</title>
           <?php require __DIR__ . '\components\settingHead.php'?>
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
<?php require __DIR__ . '\components\header.php'?>
<div class="line"></div>
<!--ТУТ ТЕЛО СТРАНИЦЫ-->
<div class="container">
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 2vw; margin-bottom: -1.5vw">
            Проверьте правильность введенных данных
        </div>
        <?php
        unset($_SESSION['error']);
    }
    ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="margin-top: 2vw;">
                <form class="needs-validation" novalidate style="font-size: 1.5vw;" action='actions\user\login.php' method=post >
                    <div class="mb-3">
                        <label for="formGroupExampleInput"  class="form-label">Введите почту</label>
                        <input type="text" name ='milo' class="form-control" id="formGroupExampleInput" placeholder="petrov@email.com">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Ведите пароль</label>
                        <input type="password" class="form-control" name ='pass' id="formGroupExampleInput2" placeholder="Пароль">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" style="margin-top: 1vw;background-color: #FFEEEE; color: black; border-color: #FFEEEE">Войти</button>
                    </div>
                </form>
                <a href="changePassword.php">Забыли пароль?</a>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '\components\footer.php'?>
</body>
</html>
