<?php
session_start();
var_dump($_SESSION['user_login']);
if (isset($_SESSION['user_login'])) {
    echo $_SESSION['user_login']['user_id'];
    if ($_SESSION['user_login']['user_group'] === 1) {
        ?>
        <br>
        <a href="admin.php">Перейти на панель администратора</a>
        <?php
    }
}
?>
<br>
<a href="actions/user/exitProfile.php">выйти</a>
