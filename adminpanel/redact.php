<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <?php require __DIR__ . '/..\components\settingHead.php';
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
<?php require __DIR__ . '/..\components\header.php' ?>
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
    <form class="row g-3" method="post" action="../actions/admin/select.php">
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
        if (isset($_SESSION['$tov'])) {
            $field = $_SESSION['$tov'];
        }


        ?>
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Идентификатор</label>
            <input type="text" class="form-control" value="<?= $field['id'] ?? '' ?>" name="id" id="validationServer01">
            <div class="col-12">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"
                    style="background-color: #FFEEEE; border-color: #FFEEEE ; color: black; margin-top: 1vw">Получит
                данные
            </button>
        </div>
    </form>
    <form action="../actions/admin/func_red.php" enctype="multipart/form-data" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Название товара</label>
            <input type="text" class="form-control" name="name" value="<?= $field['name'] ?? '' ?>"
                   id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Цена товара</label>
            <input type="text" class="form-control" name="price" value="<?= $field['prise'] ?? '' ?>"
                   id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Описание товраа</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="desc"
                      rows="3"><?= $field['desc'] ?? '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Выберите фото (сли его необходимо изменить)</label>
            <input class="form-control" name="photo" onchange="previewFile()" type="file" id="formFile">
            <img src="" alt="Image preview" id="imagePreview" style="max-width: 200px; display: none;">
        </div>
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Группа товара</label>
            <select class="form-select" name="group" id="validationDefault04" required>
                <option selected disabled value="<?= $field['group'] ?? '' ?>">Выберите...</option>
                <?php
                foreach ($_SESSION['cat'] as $gr){
                    $cat = $_SESSION['cat'];
                    unset($_SESSION['cat']);
                    ?>
                    <option value="<?=$gr['id']?>"><?=$gr['type']?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Материал</label>
            <input type="text" class="form-control" name="material" value="<?= $field['material'] ?? '' ?>"
                   id="exampleFormControlInput1" placeholder="если необходимо">
        </div>
        <button class="btn btn-primary" type="submit"
                style="margin-top: 1vw;background-color: #FFEEEE; color: black; border-color: #FFEEEE">Редактировать
        </button>
    </form>
</div>
<script>
    function previewFile() {
        var preview = document.getElementById('imagePreview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
<!--НАЧАЛО ПОДВАЛА-->
<?php require __DIR__ . '/..\components\footer.php' ?>
</body>
</html>
