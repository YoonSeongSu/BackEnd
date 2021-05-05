 
<?php
    $host = 'eaaha.kro.kr';
    $user = 'root';
    $pw = 'fun1';
    $db_name = 'capstone';
    $db_port = 3306;

    $db_connection = mysqli_connect($host, $user, $pw, $db_name, $db_port);
    mysqli_set_charset($db_connection, "utf8");


    
?>
