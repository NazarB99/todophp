<?php

class SiteController
{

    public function actionIndex($sort_table = false, $method = false, $page = 1)
    {
        $tasks = Todo::getTasks($sort_table, $method, $page);

        $total = Todo::getTotalTasks();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, TODO::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . "/views/index.php");
        return true;
    }

    public function actionAddTodo()
    {
        if (isset($_POST['submit'])) {

            $fields['name'] = $_POST['name'];
            $fields['email'] = $_POST['email'];
            $fields['task'] = $_POST['task'];

            $errors = false;

            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $errors[] = "Заполните имя";
            }

            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errors[] = "Заполните email";
            }

            if (!isset($_POST['task']) || empty($_POST['task'])) {
                $errors[] = "Заполните задачу";
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Todo::createTask($fields);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /");
            }

        }

        require_once(ROOT . "/views/todoform.php");
        return true;
    }

    public function actionEditTodo($id)
    {
        if (User::isAdmin()) {
            $task = Todo::getTaskById($id);

            if (isset($_POST['submit'])) {

                $fields['id'] = (int)$id;
                $fields['name'] = $_POST['name'];
                $fields['email'] = $_POST['email'];
                $fields['task'] = $_POST['task'];

                $errors = false;

                if (!isset($_POST['name']) || empty($_POST['name'])) {
                    $errors[] = "Заполните имя";
                }

                if (!isset($_POST['email']) || empty($_POST['email'])) {
                    $errors[] = "Заполните email";
                }

                if (!isset($_POST['task']) || empty($_POST['task'])) {
                    $errors[] = "Заполните задачу";
                }

                if ($errors == false) {
                    // Если ошибок нет
                    // Добавляем новый товар
                    $response = Todo::updateTask($fields);

                    // Перенаправляем пользователя на страницу управлениями товарами
                    header("Location: /");
                }

            }
        } else {
            header("Location: /");
        }

        require_once(ROOT . "/views/todoeditform.php");
        return true;
    }

    public function actionMarkDone($id)
    {
        if (User::isAdmin()) {
            Todo::markDone($id, true);
        }

        header("Location: /");
    }

    public function actionMarkUndone($id)
    {
        if (User::isAdmin()) {
            Todo::markDone($id);
        }
        header("Location: /");
    }


    public function action404()
    {
        require_once(ROOT . "/views/404.php");
        return true;
    }


}