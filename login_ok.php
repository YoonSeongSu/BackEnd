<?php
    include "db_connection.php";

    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    function login_fail() {
        echo "
            <script>
                alert('아이디 혹은 패스워드를 다시 한 번 확인하세요');
                
            </script>
        ";

        return;
    }
    
    if ($user_id == "" || $user_pw == "") {
        login_fail();
    }
    $sql = "select * from user_info where id = '".$user_id."'";
    $result = mysqli_query($db_connection, $sql);

    $result_num = mysqli_num_rows($result);
    
    if (!$result_num) {
        login_fail();
    }

    $user_info = mysqli_fetch_array($result);
    $hash_pw = $user_info['pw'];

    mysqli_close($db_connection);

    if (password_verify($user_pw, $hash_pw)) {
        session_start();
        $_SESSION['user_id'] = $user_info['id'];

        echo "
            <script>
                alert('로그인 성공');
                location.href='main.php';
            </script>
        ";
    } else {
        login_fail();
    }
?>