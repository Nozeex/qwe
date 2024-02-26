

<!doctype html>
<html lang="en">
<head>
    <?php
    require __DIR__ . '/actions/admin/category/select_cat.php';
    require_once __DIR__ . '\database\db.php';
    session_start();
    require __DIR__ . '\components\settingHead.php';
    require_once __DIR__ . '/actions/tovar/select_all.php';
    $toHud = $_SESSION['toHud'];
    unset($_SESSION['toHud']);
    $toGame= $_SESSION['toGame'];
    unset($_SESSION['toGame']);

    ?>
<title>Document</title>
</head>
<body>
<?php require 'components\header.php'?>
<div class="card text-bg-dark" style="">
    <img src="img/Component%2040.png" alt="...">
    <div class="card-img-overlay">
        <h5 class="card-title" style="margin-left: 50px;">"Калейдоскоп"</h5>
        <p class="card-text" style="margin-left: 50px;">Здесь каждый найдет то, что ему нравится</p>
    </div>
</div>
<div class="itemSel">
    <ul class="nav nav-pills nav-fill" style="margin-top: 25px; background-color: #FFEEEE">
        <?php
        $cat = $_SESSION['cat'];
        unset($_SESSION['cat']);
        foreach ($cat as $gr){

            ?>
            <li class="nav-item">
                <a class="nav-link" href="actions/tovar/selectOneGroup.php?id=<?=$gr['id']?>"><?=$gr['type']?></a>
            </li>
        <?php
        }
        ?>


    </ul>
</div>
<div class="section-header">
    <h2>Художникам</h2>
</div>
<div class="line"></div>
<div style="margin-left: 2vw; margin-right: 2vw">
    <div class="row row-cols-1 row-cols-md-4 g-6">
        <?php
        $counter = 0;
        foreach ($toHud as $item):
            $counter++;
            // Если счетчик достиг трех, выходим из цикла
            if ($counter > 3) {
                break;
            }
            ?>
            <div class="col">
                <a href="/actions/tovar/selectOneTov.php?id=<?= $item['id']?>" style="text-decoration: none">
                    <div class="card">
                        <img src="<?=  '/' .$item['photo']; ?>" height="316" width="316" class="card-img-top"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 31px"><?= $item['name']; ?></h5>
                            <p class="card-text" style="font-size: 25px"><?= $item['prise']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="col">
            <a href="actions/tovar/selectOneGroup.php?id=<?=1?>" style="text-decoration: none">
            <div class="card" style="background-color: #FFEEEE">
                <img src="img/Arrow%201.svg" height="316" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 31px">Показать больше</h5>
                    <p class="card-text" style="font-size: 25px; color: #FFEEEE">300P</p>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
<div class="section-header">
    <h2>Настольные игры</h2>
</div>
<div class="line"></div>
<div style="margin-left: 2vw; margin-right: 2vw">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($toGame as $item): ?>
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
        <?php endforeach; ?>
        <div class="col">
            <a href="actions/tovar/selectOneGroup.php?id=<?=2?>" style="text-decoration: none">
            <div class="card" style=" background-color: #FFEEEE">
                <img src="img/Arrow%201.svg" height="316" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 31px">Показать больше</h5>
                    <p class="card-text" style="font-size: 25px; color: #FFEEEE">300P</p>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
<?php require __DIR__ . '\components\footer.php'?>
</body>
</html>
