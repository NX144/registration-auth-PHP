<?php
    session_start();

    if(!empty($_POST['login']) && !empty($_POST['password'])) {
        require_once('db.php');
        $query = "SELECT * FROM `reg_auth` WHERE `login` =\"{$_POST['login']}\"";
        $sql_query = mysqli_query($db_connect, $query);
        $row_cnt = mysqli_num_rows($sql_query);
        if ($row_cnt != "0" || $row_cnt != "" || $row_cnt != null || $row_cnt != false) {
            $query_pass = "SELECT * FROM `reg_auth` WHERE `login` =\"{$_POST['login']}\" AND `pass` =\"{$_POST['password']}\"";
            $sql_query_pass = mysqli_query($db_connect, $query_pass);
            $row_count = mysqli_num_rows($sql_query_pass);
            if($row_count != "0" || $row_count != "" || $row_count != null || $row_count != false) {
                $_SESSION['auth'] = 'true';
                $_SESSION['login'] = $_POST['login'];
                $auth_text_result_good = "Вы успешно вошли в свой аккаунт!";
            } else {
                $_SESSION['auth'] = 'false';
                $_SESSION['login'] = "";
                $auth_text_result_bad = "Неверный пароль!";
            }
        } else {
            $_SESSION['auth'] = 'false';
            $_SESSION['login'] = "";
            $auth_text_result_bad = "Такого пользователя не существует, зарегистрируйтесь!";
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
    <title>Авторизация пользователя</title>
</head>
<body>
    <div style=" width: 170px; margin: 0 auto; margin-top: 200px;">
        <form action="#" method="POST">
            <p style="text-align: center; font-weight: bold; font-size: 16px">Авторизация</p>
            <label for="login">Введите логин: </label>
            <br>
            <input type="text" required placeholder="Введите логин... " name="login">
            <br>
            <br>
            <label for="password">Введить пароль: </label>
            <br>
            <input type="password" required placeholder="Введить пароль... " name="password">
            <br>
            <br>
            <button type="submit" style="margin: 0 auto; display: block;">Авторизоваться</button>
            <br>
        </form>
        <div class="result_reg" style="text-align: center; width: 170px; margin: 0 auto;">

            <?php
            if(isset($auth_text_result_good)) :?>
                <span style="color: black; font-family: sans-serif; opacity: .9; font-size: 15px;">
                    <?php echo $auth_text_result_good;?>
                </span>
            <?php endif; if(isset($auth_text_result_bad)) :?>
                <span style="color: red; font-family: sans-serif; opacity: .9; font-size: 15px;">
                    <?=$auth_text_result_bad;?>
                </span>
            <?php endif;
            ?>

            <hr>
        </div>
        <div class="reg" style="text-align: center">
            <span>Не зарегистрированны?</span>
            <a href="reg.php">Зарегистрироваться!</a>
            <br>
            <hr>
            <a href="index.php">На главную</a>
        </div>
    </div>
</body>
</html>
