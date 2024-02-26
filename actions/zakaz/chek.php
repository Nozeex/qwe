    <?php
    require_once '../tovar/selectTovForCort.php';
    require_once __DIR__ . '/../../database/db.php';
    session_start();
    $session_data = $_SESSION['cart'];
    $us_id = $_SESSION['user_login']['user_id'];
    var_dump($session_data);
    var_dump($_POST);
    $total = $_POST['total'];
    $count = $_POST['count'];
    // Создание заказа
    $query_order = $db->prepare("INSERT INTO `orders`(`user`, `total_prise`, `count`) VALUES (:us_id, :total, :count)");
    $query_order->execute([
        'us_id' => $us_id,
        'total' => $total,
        'count' => $count
    ]);

    // Получение ID только что созданного заказа
    $order_id = $db->lastInsertId();

    foreach ($_SESSION['tov_in_corz'] as $corz) {
        $product_id = $corz['id'];
        if (isset($_SESSION['cart'][$id][$product_id])) {
            $quantity = $_SESSION['cart'][$id][$product_id];
            for ($i = 0; $i < $quantity; $i++) {
                // Добавление чека с привязкой к заказу
                $query = $db->prepare("INSERT INTO `check1`(`user_id`, `tovar_id`, `prise`, `order_id`)
                                    VALUES (:us_id, :tov_id, :pr, :order_id)");
                $query->execute([
                    'us_id' => $us_id,
                    'tov_id' => $corz['id'],
                    'pr' => $corz['prise'],
                    'order_id' => $order_id  // Используем полученный ID заказа для связи с таблицей check1
                ]);
            }
        }
    }
    header('Location: ../tovar/removeAll.php');

// Уведомление пользователя о успешном оформлении заказа или другие действия

