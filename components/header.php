<!--ТУТ ХЕДЕР-->
<div class="navbar bg-body-tertiary" style="background-color: white; margin-right: 2vw; margin-left: 2vw">
    <div class="container-fluid" style="background-color: white">
        <a href="../index.php" class="navbar-brand" style="font-size: 33px; color: #D03939"> <img src="../img/brush%201.svg" width="52"
                                                                                               height="" alt="50">Калейдоскоп</a>
        <form class="d-flex" role="search" method="get" action="../actions/tovar/search.php">
            <input class="form-control me-2" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
            <button class="btn-red" type="submit">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="union" src="../img/Sear.svg" alt="">
                </div>
            </button>
        </form>
        <a class="union0 " href="../izb.php"><img src="../img/heart1.svg" alt=""></a>
        <a class="union1" href="../corzina.php"><img src="../img/Vector.svg" alt=""></a>
        <?php
        session_start();

        if (isset($_SESSION['user_login'])){
        ?>
        <a class="union2" href="../profile.php"><img src="../img/person1.svg" alt=""></a>
        <?php
        } else {
            ?>
            <a class="union2" href="../auth.php"><img src="../img/person1.svg" alt=""></a>
        <?php
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>