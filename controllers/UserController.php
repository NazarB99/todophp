<?php

class UserController{
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $password = md5($_POST['password']);

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkCredentials($name,$password)) {
                $errors[] = 'Пароль и Логин не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($name, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/signin.php');
        return true;
    }

    public function actionLogout()
    {
        if(!User::isGuest()){
            unset($_SESSION['user']);
        }

        header("Location: /");

        return true;
    }

}