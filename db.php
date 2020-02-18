<?php
    define("DATEBASE", [
        "DBHOST" => "", //Field for host
        "DBUSER" => "", //Field for user PMA
        "DBPASS" => "", //Field for password PMA
        "DBNAME" => ""  //Field for name DB in PMA
    ]);
    $db_connect = mysqli_connect(DATEBASE["DBHOST"], DATEBASE["DBUSER"], DATEBASE["DBPASS"], DATEBASE["DBNAME"]);

    if($db_connect == false || $db_connect == 'false' || $db_connect === false) {
        echo "<h4 style='color: red; font-family: sans-serif;'>Ошибка соединения с базой данных!</h4>";
        die;
    } else {
        echo "<script>console.log('DateBase - Connected')</script>";
    }