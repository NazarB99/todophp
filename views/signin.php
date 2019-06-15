
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Вход</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/../template/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<?php include_once (ROOT . "/views/layout/nav.php")?>
<form class="form-signin" action="#" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
    <label for="inputEmail" class="sr-only">Логин</label>
    <input type="text" name="name" id="inputEmail" class="form-control" placeholder="***" required autofocus>
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="******" required>
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Вход</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
</body>
</html>
