<!DOCTYPE html>
<html lang="en">
<head>
    <?php  require __DIR__ . '/actions/admin/category/select_cat.php';
    require __DIR__ . '/components/settingHead.php';
    ?>
    <title>Фильтр товаров</title>

</head>
<body>
<?php require __DIR__ . '/components/header.php'?>
<div class="container mt-5" style="font-size: 1.5vw" >
    <form id="productFilterForm" action="actions/tovar/filt.php" method="post">
        <div class="form-group">
            <label for="priceFrom">Цена от:</label>
            <input type="number" class="form-control" id="priceFrom" name="priceFrom" placeholder="Минимальная цена (можно не указывать)">
        </div>
        <div class="form-group">
            <label for="priceTo">Цена до:</label>
            <input type="number" class="form-control" id="priceTo" name="priceTo" placeholder="Максимальная цена (можно не указывать)">
        </div>
        <div class="form-group">
            <label for="productGroup">Группа товаров:</label>
            <select class="form-control" id="productGroup" name="productGroup">
                <option value="">Выберите группу товаров (обязательно к указанию)</option>
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
        <div class="form-group">
            <label for="material">Материал:</label>
            <input type="text" class="form-control" id="material" name="material" placeholder="Материал товара (можно не указывать) ">
        </div>
        <button type="submit" class="btn "  style="background-color: #FFEEEE; color: black; b">Применить фильтр</button>
    </form>
</div>

<?php require __DIR__ . '/components/footer.php'?>
</body>
</html>