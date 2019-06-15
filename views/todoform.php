<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Добавить</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../template/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<?php include_once(ROOT . "/views/layout/nav.php") ?>
<form class="form-signin" action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Имя пользователя</label>
        <input type="text" name="name" placeholder="Имя" class="form-control" id="exampleFormControlTextarea1"/>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">E-mail</label>
        <input type="email" name="email" placeholder="email@primer.com" class="form-control"
               id="exampleFormControlTextarea1"/>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Задача</label>
        <textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-lg btn-dark" id="exampleFormControlTextarea1"/>
    </div>
</form>
</body>
</html>