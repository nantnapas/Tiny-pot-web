<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $dbname = "db_shop";
    $c = mysqli_connect($host,$user,$pw,$dbname,"3306");
    if (!$c) {
        echo "<h3>ERROR : ไม่สามารถติดตอฐานข้อมูลได้</h3>";
        exit();
    }
    mysqli_select_db($c,$dbname);
    MYSQLI_SET_CHARSET($c,"utf8");
?>