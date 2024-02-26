<?php
// Создаем валидные тестовые данные
$_POST['milo'] = 'test@example.com';
$_POST['pass'] = 'password123';

// Создаем заглушку для базы данных
class MockPDO extends PDO {
    public function __construct() {}
    public function prepare($statement, $options = NULL) { return new MockPDOStatement(); }
}

class MockPDOStatement {
    public function execute($input_parameters = NULL) {
        // Подставляем валидные тестовые данные для пользователя
        $this->data = [
            'id' => 1,
            'group_id' => 1,
            'mail' => 'testeample.com',
            'password' => 'password123'
        ];
        return true;
    }

    public function fetch($fetch_style = NULL, $cursor_orientation = NULL, $cursor_offset = NULL) {
        return $this->data;
    }
}

// Подключаем файл с кодом
require_once __DIR__ . '/../../database/db.php'; // Подключаем файл с подключением к базе данных
require_once __DIR__ . '/login.php'; // Подключаем файл с кодом для тестирования

// Проверяем, что сессия начата
assert(session_status() == PHP_SESSION_ACTIVE);

// Проверяем, что пользователь был успешно найден в базе данных и сессия установлена
assert(isset($_SESSION['user_login']));
assert($_SESSION['user_login']['user_id'] == 1);
assert($_SESSION['user_login']['user_group'] == 1);

echo "Тест пройден успешно!";
