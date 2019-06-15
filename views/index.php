<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Главная</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/../template/css/starter-template.css" rel="stylesheet">
</head>

<body>

<?php include_once(ROOT . "/views/layout/nav.php") ?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Список всех задач</h1>
        <div>
            <a href="/name/asc">Сорт. по имени(по возр.)</a>|
            <a href="/name/desc">Сорт. по имени(по убыв.)</a>|
            <a href="/email/asc">Сорт. по email(по возр.)</a>|
            <a href="/email/desc">Сорт. по email(по убыв.)</a>|
            <a href="/done/asc">Сорт. по готовности(сначала невыпол.)</a>|
            <a href="/done/desc">Сорт. по готовности(сначала выпол.)</a>
        </div>
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Задача</th>
                <?php if (User::isAdmin()): ?>
                    <th scope="col"></th>
                    <th scope="col"></th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <th scope="row"><?php echo $task['id'] ?></th>
                    <td><?php echo $task["name"] ?></td>
                    <td><?php echo $task["email"] ?></td>
                    <td><?php echo $task["task"] ?></td>
                    <?php if (User::isAdmin()): ?>
                        <?php if ($task['done'] == false): ?>
                            <td>
                                <a class="btn btn-success" href="/todo/done/<?php echo $task["id"] ?>"> Пометить как "Выполнено"</a>
                            </td>
                        <?php else: ?>
                            <td>
                                <a class="btn btn-danger" href="/todo/undone/<?php echo $task["id"] ?>">Пометить как "Не выполнено"</a>
                            </td>
                        <?php endif; ?>
                        <td><a class="btn btn-primary" href="/todo/edit/<?php echo $task["id"] ?>">Изменить задачу</a>
                        </td>
                    <?php else: ?>
                        <?php if ($task['done'] == false): ?>
                            <td>
                                <p>Не Выполнено</p>
                            </td>
                        <?php else: ?>
                            <td>
                                <p>Выполнено</p>
                            </td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination->get(); ?>
    </div>

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/../template/js/popper.min.js"></script>
<script src="/../template/js/bootstrap.min.js"></script>
</body>
</html>
