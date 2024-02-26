<!DOCTYPE html>
<html lang="en">
<head>
    <?php require __DIR__ . '/actions/admin/category/select_cat.php';
    require __DIR__ . '/components/settingHead.php';
    session_start();


    if (isset($_SESSION['result'])) {
        $Group = $_SESSION['result'];
        unset($_SESSION['result']);
    } else {
        $Group = $_SESSION['Group'];
        unset($_SESSION['Group']);
    }

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
<div style="margin-left: 2vw; margin-right: 2vw">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        if (!empty($Group )){
        foreach ($Group as $item): ?>
            <div class="col">
                <a href="/actions/tovar/selectOneTov.php?id=<?= $item['id']?>" style="text-decoration: none">
                    <div class="card">
                        <img src="<?php echo '/' .$item['photo']; ?>" height="316" width="316" class="card-img-top"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 31px"><?php echo $item['name']; ?></h5>
                            <p class="card-text" style="font-size: 25px"><?php echo $item['prise']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        endforeach;
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Подобных товаров нет, попробуйте изменить условия фильтрации
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php require __DIR__ . '/components/footer.php'?>
</body>
</html>