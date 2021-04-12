<?php
include "db_connection.php";

$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];
$address=$_POST['address'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "
    INSERT INTO user_info
    (id, pw, name, address)
    VALUES('".$email."', '".$hashed_password."', '".$name."', '".$address."')
    ";
$result = mysqli_query($db_connection, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($db_connection);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.php";
    </script>
<?php
}
?>