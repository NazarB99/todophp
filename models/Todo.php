<?php

class Todo
{
    const SHOW_BY_DEFAULT = 3;

    public static function getTasks($sort_table = false, $method = false,$page = 1)
    {
        $limit = self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        if($sort_table == false || $sort_table == "false"){
            $sql = 'SELECT id, name, task, email,done FROM todos ORDER BY id ASC LIMIT :limit OFFSET :offset';
        }
        else{
            $sql = 'SELECT id, name, task, email,done FROM todos ORDER BY ' . $sort_table . " " .  $method . ' LIMIT :limit OFFSET :offset';
        }


        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        $todos = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $todos[$i]['id'] = $row['id'];
            $todos[$i]['name'] = $row['name'];
            $todos[$i]['task'] = $row['task'];
            $todos[$i]['email'] = $row['email'];
            $todos[$i]['done'] = $row['done'];
            $i++;
        }
        return $todos;

    }

    public static function createTask($fields)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO todos (name, email, task) VALUES (:name, :email, :task)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $fields['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $fields['email'], PDO::PARAM_STR);
        $result->bindParam(':task', $fields['task'], PDO::PARAM_STR);

        if ($result->execute()) {
            return $db->lastInsertId();
        }

        return 0;

    }

    public static function updateTask($fields)
    {
        $db = Db::getConnection();

        $sql = "UPDATE todos SET name = :name, email = :email, task = :task WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $fields['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $fields['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $fields['email'], PDO::PARAM_STR);
        $result->bindParam(':task', $fields['task'], PDO::PARAM_STR);

        return $result->execute();
    }

    public static function markDone($id, $done = false)
    {
        $db = Db::getConnection();

        $sql = "UPDATE todos SET done = :done WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':done',$done , PDO::PARAM_BOOL);

        return $result->execute();
    }

    public static function getTotalTasks()
    {
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM todos';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTaskById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM todos WHERE id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();

    }

}