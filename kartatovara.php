<!doctype html>
<html lang="en">
<head>
    <title>Document</title>

    <?php require __DIR__ . '\components\settingHead.php';
    require 'actions/tovar/select_all.php';
require 'select_otzv.php';

//$id = urlencode($_GET['id']);
//$url = sprintf("actions/review/select_otzv.php?id=%s", $id);
//echo "URL: $url"; // Добавить эту строку для отладки
//require __DIR__ .'/'. $url;


    session_start();
    $oneTovar = $_SESSION['tov'];
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
<?php require __DIR__ . '\components\header.php' ?>

<div class="section-header">
    <h2><img src="img/star.png" alt=""><img src="img/star.png" alt=""><img src="img/star.png" alt=""><img
                src="img/star.png" alt=""><img src="img/star.png" alt=""></h2>
</div>
<div class="line"></div>
<!--ТУТ ТЕЛО СТРАНИЦЫ-->
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div style="font-size: 3.1vw; margin-left: 2vw; margin-top: -0.5vw">
            <?= $oneTovar['name']; ?>
            <p style="margin-top: -1.2vw; font-size: 2vw; opacity: 0.4;"><?= $oneTovar['id']; ?></p>
        </div>
        <img src="<?= '/' . $oneTovar['photo']; ?>"
             style="width: 35vw; height: 35vw; margin-left: 2vw; border-radius: 10px; margin-top: -2vw"
             class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col">
        <div style="font-size: 2vw; margin-left: 2vw; margin-top: 2vw">
            Описание:
            <br>
            <?= $oneTovar['desc']; ?>
            TURY
            <br>
            Материал:
            <br>
            <?= !empty($oneTovar['material']) ? $oneTovar['material'] : 'Информация отсутствует'; ?>

        </div>
    </div>
    <div class="col">
        <div class="card border-dark mb-3"
             style="border-radius: 10px;max-width: 6789rem; margin-right: 5vw; border-style: none; margin-top: 2vw">
            <div class="card-header" style="font-size: 2vw; border-radius: 10px"><?= $oneTovar['prise']; ?></div>
            <div class="card-body" style="border-radius: 10px">


                <div class="mb-3">
                    <form action="/actions/tovar/addToCart.php?id=<?= $oneTovar['id']; ?>" method="post">
                        <button type="submit" class="form-control" id="exampleInputPassword1" style="font-size: 2vw">В
                            коризну
                        </button>
                    </form>
                </div>
                <p class="card-text" style="font-size: 2vw">Самовывоз из магазина</p>
                <p class="card-text" style="font-size: 2vw; opacity: 0.4; margin-top: -1vw">бесплатно, сегодня</p>
                <p class="card-text" style="font-size: 2vw">Доставка курьером</p>
                <p class="card-text" style="font-size: 2vw; opacity: 0.4; margin-top: -1vw ">от 500Р, послезавтра</p>
            </div>
        </div>
    </div>
</div>

<h2 style="margin-left: 2vw">Корзина</h2>
</div>
<div class="line">
<button type="button" style="margin-left: 2vw; margin-top: 2vw; background-color: #FFEEEE"  class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Оставить отзыв
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Оцените и оставьте отзыв</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form action="actions/review/add_otzv.php?id=<?=$oneTovar['id'];?>" method="post">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Оценка:</label>
                        <select class="form-select" id="rating" name="rating">
                            <option value="5">5 - Отлично</option>
                            <option value="4">4 - Хорошо</option>
                            <option value="3">3 - Удовлетворительно</option>
                            <option value="2">2 - Плохо</option>
                            <option value="1">1 - Ужасно</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="feedback" class="form-label">Отзыв:</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                    </div>
                    <button type="submit"  style="background-color: #FFEEEE"  class="btn">
                        Оставить отзыв
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
/** @var TYPE_NAME $all_query */
foreach ($all_query as $query){
    ?>

    <div style="font-size: 2vw; margin-left: 2vw; margin-top: 4vw;">
        Оценка: <?= $query['Score']?>;
    </div>
    <div style="font-size: 1vw; margin-left: 2vw; margin-top: 1vw;">
        Комментарий: <?= $query['Desk']?>;
    </div>


    <?php
}
?>


<?php require __DIR__ . '\components\footer.php' ?>


</body>
</html>
