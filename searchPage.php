
<!doctype html>
<html lang="en">
<head>
    <?php
    session_start();
    require_once __DIR__ . '\database\db.php';
    require __DIR__ . '\components\settingHead.php';
    if (isset($_SESSION['sear_tov'])){
        $sear = $_SESSION['sear_tov'];
        unset($_SESSION['sear_tov']);
    }

    ?>
    <title>Document</title>
    <?php
    ?>
</head>
<body>
<?php require __DIR__ . '\components\header.php' ?>
<div style="margin-left: 2vw; margin-right: 2vw">
    <?php
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 2vw; margin-bottom: -1.5vw">
            Таких товаров нет, или попробуйте по другому составить запрос поиска
        </div>
        <?php
        unset($_SESSION['error']);
    }
    ?>
    <div class="row row-cols-1 row-cols-md-4 g-6">
        <?php
        if (!empty($sear)){
        foreach ($sear as $item):
            ?>
            <div class="col">
                <a href="/actions/tovar/selectOneTov.php?id=<?= $item['id'] ?>" style="text-decoration: none">
                    <div class="card">
                        <img src="<?= '/' . $item['photo']; ?>" height="316" width="316" class="card-img-top"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 31px"><?= $item['name']; ?></h5>
                            <p class="card-text" style="font-size: 25px"><?= $item['prise']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; } ?>
    </div>
</div>

<?php require __DIR__ . '\components\footer.php' ?>
</body>
</html>
