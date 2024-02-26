<!doctype html>
<html lang="en">
<head>
<title>Document</title>
           <?php require __DIR__ . '\..\components\settingHead.php';
           require __DIR__ . '/../actions/admin/category/select_cat.php';
           session_start();
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
<?php require __DIR__ . '\..\components\header.php'?>
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
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            Проверьте правильность введенных данных
        </div>
        <?php
        unset($_SESSION['error']);
    }
    ?>
    <form action="/actions/admin/func_add.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название товара</label>
        <input type="text" class="form-control" name = "tov_name" id="exampleFormControlInput1">
    </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Цена товара</label>
        <input type="text" class="form-control" name="tov_price" id="exampleFormControlInput1"  >
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Описание товраа</label>
        <textarea class="form-control" name="tov_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Выберите фото</label>
            <input class="form-control" name="tov_photo" onchange="previewFile()" type="file" id="formFile">
            <img src= "" alt="Image preview" id="imagePreview" style="max-width: 200px; display: none;">
        </div>
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Группа товара</label>
            <select class="form-select" id="validationDefault04" name="tov_group" required>
                <option selected disabled value="">Выберите...</option>
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
            <input type="text" class="form-control" name="tov_material" id="exampleFormControlInput1" placeholder="если необходимо">
        </div>
            <button class="btn btn-primary" type="submit" style="margin-top: 1vw;background-color: #FFEEEE; color: black; border-color: #FFEEEE">Добавить</button>
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
<?php require __DIR__ . '/..\components\footer.php'?>
</body>
</html>
