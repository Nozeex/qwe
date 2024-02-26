<!doctype html>
<html lang="en">
<head>
    <?php
    require_once __DIR__ . '\database\db.php';
    require_once __DIR__ . '/actions/tovar/selectTovForCort.php';
    session_start();
    $id = $_SESSION['user_login']['user_id'];
    var_dump($_SESSION['cart']);
    ?>
<!--    <pre>-->
  <?php
//    var_dump($_SESSION['cart']);
//    var_dump($_SESSION['tov_in_corz']);
  ?>
<!--    </pre>-->
    <title>Document</title>
    <?php require __DIR__ . '\components\settingHead.php' ?>
</head>
<body>
<?php require __DIR__ . '\components\header.php' ?>
<div class="section-header">
    <h2>Корзина</h2>
</div>
<div class="line"></div>
<nav class="nav" style="margin-left: 2vw">
    <label class="form-check-label" for="flexCheckDefault"
           style="font-size: 2vw; font-family: Roboto; margin-top: 1.6vw">
        <a href="" style="text-decoration: none; color: black">Очистить корзину</a>
    </label>
    <button form="chekDelet" class="btn btn-primary .text-nowrap" type="submit"
            style=" margin-top: 1vw; margin-left: 2vw; background-color: white; color: black; border-color: black; font-size: 2vw">
        Удалить выбранный товар
    </button>
</nav>
<?php
//$total_price = 0;
//if (isset($_SESSION['tov_in_corz'])) {
//    foreach ($_SESSION['tov_in_corz'] as $product) {
//        // Проверяем, существует ли элемент "prise" в текущем продукте
//        if (isset($product['prise'])) {
//            // Преобразуем цену в число и добавляем к общей сумме
//            $total_price += (int)str_replace('P', '', $product['prise']);
//        }
//    }
//}
$total_price = 0;
foreach ($_SESSION['tov_in_corz'] as $corz) {
    $product_id = $corz['id'];
    if (isset($_SESSION['cart'][$id][$product_id])) {
        $quantity = $_SESSION['cart'][$id][$product_id];
        for ($i = 0; $i < $quantity; $i++) {
            $total_price += (int)str_replace('P', '', $corz['prise']);
        }
    }
}

?>
<div class="container container-fluid">
    <div class="col">
        <?php
        foreach ($_SESSION['tov_in_corz'] as $corz) {
            $product_id = $corz['id'];
            if (isset($_SESSION['cart'][$id][$product_id])) {
                $quantity = $_SESSION['cart'][$id][$product_id];
                for ($i = 0; $i < $quantity; $i++) {
                    ?>

                    <div class="col-8">
                        <form action="actions/tovar/removeFromCart.php" id="chekDelet" method="post">
                            <input class="form-check-input" name="selected_products" type="radio"
                                   value="<?= $corz['id'] ?>" id="flexCheck"
                                   style="margin-left: -5.1vw; width: 2vw; height: 2vw; margin-top: 10vw ">
                            <label for="flexCheck">
                                <div class="card mb-3"
                                     style="width: 50vw; margin-left: 2vw; margin-top: 2vw; border-style: none; border-radius: 10px">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="../../<?= $corz['photo'] ?>" style="border-radius: 10px"
                                                 class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="border-radius: 10px">
                                                <h5 class="card-title" style="font-size: 2vw"><?= $corz['name'] ?></h5>
                                                <p class="card-text" style="font-size: 1vw; margin-top: 4vw">
                                                <div class="counter" style="visibility: hidden">
                                                    <input type="checkbox" id="minusCheckbox"
                                                           style="width: 2vw;height:1vw; margin-top: 5.1vw ">
                                                    <span id="count"
                                                          style="font-size: 1.4vw; margin-top: 5.1vw">1</span>
                                                    <input type="checkbox" id="plusCheckbox"
                                                           style="width: 2vw;height:1vw; margin-top: 5.1vw "
                                                           placeholder="+">
                                                </div>
                                                <p class="card-text"
                                                   style="font-size: 2vw; margin-top: -3vw; margin-left: 0vw">
                                                    <?= $corz['prise'] ?>P
                                                </p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </form>
                    </div>
                    <?php
                }
            }
        }
        ?>
        <?php
        function sum_elements($array)
        {
            $sum = 0;
            foreach ($array as $value) {
                $sum += $value;
            }
            return $sum;
        }

        // Проверяем, существует ли индекс $id в массиве $_SESSION['cart']
        if (isset($_SESSION['cart'][$id])) {
            // Вычисляем сумму элементов в массиве $_SESSION['cart'][$id]
            $total_quantity = sum_elements($_SESSION['cart'][$id]);
        } else {
            $total_quantity = 0;
        }
        if (isset($_SESSION['cart']) && isset($_SESSION['user_login'])) {
            ?>
            <form action="actions/zakaz/chek.php" method="post">
            <div class="position-absolute top-0 end-0" style="margin-top: 13vw; margin-right: 2vw">
                <div class="card border-dark mb-3"
                     style="border-radius: 10px;max-width: 6789rem; margin-left: 5vw; border-style: none">
                    <div class="card-header" style="font-size: 2vw; border-radius: 10px">
                        Товаров <?= $total_quantity ?></div>
                    <div class="card-body" style="border-radius: 10px">
                        <h5 class="card-title" style="font-size: 2vw">Скидка 0P</h5>
                        <p class="card-text" style="font-size: 2vw">Итого: <?=$total_price?>P</p>
                        <div class="mb-3">
                            <input type="hidden" name="count" value="<?= $total_quantity ?>">
                            <input type="hidden" name="total" value="<?=$total_price?>">
                            <button type="submit" class="form-control" id="exampleInputPassword1"
                                    style="font-size: 2vw">
                                Оформить заказ
                            </button>
                            <label for="exampleInputPassword1" class="form-label">Введите промокод (при наличии)</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
        }
        ?>
    </div>
</div>
<div style="margin-top: 20vw">
<?php require __DIR__ . '\components\footer.php' ?>
</div>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
