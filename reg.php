<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        require_once('db.php');
        $login = $_POST['login'];
        $query = "SELECT * FROM `reg_auth` WHERE `login` = \"{$login}\"";
        $sql_query = mysqli_query($db_connect, $query);
        $row_count = mysqli_num_rows($sql_query);
        if($row_count == "0" || $row_count == "" || $row_count == null || $row_count == false) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "INSERT INTO `reg_auth` (`login`,`email`,`pass`) VALUES('".$login."', '".$email."', '".$password."')";
            $sql_query = mysqli_query($db_connect, $query);
            $reg_text_result_good = "Вы успешно зарегистрировались!";
        } else {
            $reg_text_result_bad = "Пользователь с таким логином уже существует!";
        }
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация аккаунта</title>
</head>
<body>
    <div style="width: 170px; margin: 0 auto; margin-top: 200px;">
        <form action="#" method="POST">
            <p style="text-align: center; font-weight: bold; font-size: 16px">Регистрация</p>
            <label for="login">Введите логин: </label>
            <br>
            <input type="text" required placeholder="Введите логин... " name="login">
            <br>
            <br>
            <label for="email">Введите свою эл.почту: </label>
            <br>
            <input type="email" required placeholder="Введите почту... " name="email">
            <br>
            <br>
            <label for="password">Введить пароль: </label>
            <br>
            <input type="password" required placeholder="Введить пароль... " name="password">
            <br>
            <br>
            <button type="submit" style="margin: 0 auto; display: block;">Зарегистрироваться</button>
            <br>
        </form>
    </div>
    <div class="result_reg" style="text-align: center; width: 170px; margin: 0 auto;">

        <?php
            if(isset($reg_text_result_good)) :?>
                <span style="color: black; font-family: sans-serif; opacity: .9">
                    <?php echo $reg_text_result_good;?>
                </span>
            <?php endif; if(isset($reg_text_result_bad)) :?>
                <span style="color: red; font-family: sans-serif; opacity: .9">
                    <?=$reg_text_result_bad;?>
                </span>
            <?php endif;
        ?>

        <hr>
    </div>
    <div class="reg" style="text-align: center; width: 170px; margin: 0 auto;">
        <span>У вас есть аккаунт?</span>
        <a href="auth.php">Авторизоваться!</a>
        <br>
        <hr>
        <a href="index.php">На главную</a>
    </div>
</body>
</html>