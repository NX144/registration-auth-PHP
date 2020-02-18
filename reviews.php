<?php
    session_start();
    if($_SESSION['auth'] == 'false' || empty($_SESSION['auth']) || !isset($_SESSION['auth']) || $_GET['authorization'] == 'no' || !empty($_GET)) {
        echo "Для просмотра контента необходимо зарегистрироваться или войти в существующий аккаунт!";
        echo "<br>";
        echo "<a href='index.php?authorization=no'>На главную</a>";
        $_SESSION['auth'] = 'false';
        die;
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отзывы</title>
</head>
<body>
    <?php
    if($_SESSION['auth'] == 'true') :?>
        <div style="display:flex; flex-direction: row; justify-content:space-between;">
            <ul style="display:flex; justify-content:space-between; list-style-type: none; font-family: sans-serif; font-weight: bold; width: 250px;">
                <li style="cursor: pointer"><span><a href="index.php" style="text-decoration: none; color: black;">Главная</a></span></li>
                <li style="cursor: pointer"><a href="reviews.php" style="text-decoration: none; color: black;">Отзывы</a></li>
                <li style="cursor: pointer"><a href="contacts.php" style="text-decoration: none; color: black;">Контакты</a></li>
            </ul>
            <ul style="display:flex; justify-content:space-between; list-style-type: none; font-family: sans-serif; font-weight: bold;">
                <li><span>
                        Вы вошли под логином:
                        <?php echo $_SESSION['login']; ?>
                    </span>
                    <span> | </span>
                    <span>
                        <a href="reviews.php?authorization=no" style="text-decoration: none; color: black;">Выйти</a>
                    </span>
                </li>
            </ul>
        </div>
    <?php endif;
    if($_SESSION['auth'] == 'false' || empty($_SESSION['auth']) || !isset($_SESSION['auth'])):?>
        <div style="display:flex; flex-direction: row; justify-content:space-between;">
            <ul style="display:flex; justify-content:space-between; list-style-type: none; font-family: sans-serif; font-weight: bold; width: 250px;">
                <li style="cursor: pointer"><span><a href="index.php" style="text-decoration: none; color: black;">Главная</a></span></li>
                <li style="cursor: pointer"><a href="reviews.php" style="text-decoration: none; color: black;">Отзывы</a></li>
                <li style="cursor: pointer"><a href="contacts.php" style="text-decoration: none; color: black;">Контакты</a></li>
            </ul>
            <ul style="display:flex; justify-content:space-between; list-style-type: none; font-family: sans-serif; font-weight: bold;">
                <li>
                    <span><a href="auth.php" style="text-decoration: none; color: black;">Войти</a></span>
                    <span> | </span>
                    <span><a href="reg.php" style="text-decoration: none; color: black;">Регистрация</a></span>
                </li>
            </ul>
        </div>
    <?php endif;?>
    <p style="display:inline-block; padding-left: 30px;font-weight: bold; font-size: 20px; font-family: sans-serif; color: darkorange;">Отзывы</p>
</body>
</html>
