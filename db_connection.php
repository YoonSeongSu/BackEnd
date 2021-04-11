 
<?php
    $host = '15.164.25.222';
    $user = 'root';
    $pw = 'fun1';
    $db_name = 'capstone';
    $db_port = 3306;

    $db_connection = mysqli_connect($host, $user, $pw, $db_name, $db_port);
    $db_connection->set_charset("utf8");

    function mq($sql) {
        global $db_connection;
        return mysqli_query($db_connection, $sql);
    }
?>
<!--
$db_host = "15.164.25.222";
$db_user = "root";
$db_passwd = "fun1";
$db_name = "capstone";
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
$db_connection->set_charset("utf8");

if (mysqli_connect_errno($conn)) {
echo "데이터베이스 연결 실패: " . mysqli_connect_error();
} else {
echo "성공~!!!";
}

-->
