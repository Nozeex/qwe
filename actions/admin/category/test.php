<?php

require_once 'path/to/your/php/file.php';

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testOrderCreation()
    {
        // Создаем тестовые данные для сессии
        $_SESSION['cart'] = array(
            '1' => array(
                'product_id' => 1,
                'quantity' => 2,
                'price' => 10
            ),
            '2' => array(
                'product_id' => 2,
                'quantity' => 3,
                'price' => 15
            )
        );

        $_SESSION['user_login'] = array(
            'user_id' => 123 // Тестовый ID пользователя
        );

        // Предположим, что $db и $_POST нужно каким-то образом подменить для теста.
        // Например, можно использовать фейковую базу данных и POST данные.

        // Создаем объект Order и вызываем метод для создания заказа
        $order = new Order();
        $order->createOrder();

        // Проверяем, был ли выполнен редирект после создания заказа
        $this->assertContains('Location: ../tovar/removeAll.php', xdebug_get_headers());

        // Проверяем, что данные о заказе были сохранены в базе данных
        // Не забудьте адаптировать этот тест в зависимости от того, какой механизм используется для доступа к базе данных
        $this->assertNotEmpty($order->getOrderId()); // Проверяем, что ID заказа не пустой

        // Очищаем тестовые данные
        unset($_SESSION['cart']);
        unset($_SESSION['user_login']);
    }
}
