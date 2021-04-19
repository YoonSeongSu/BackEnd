<?php

session_start();

include "db_connection.php";
$id = $_SESSION['user_id'];
$pw = $_POST['pw'];
$new_pw = $_POST['new_pw'];
if($pw == '' || $new_pw == '')
{
    echo "<script>alert('비밀번호를 올바르게 입력해주세요.');history.back();</script>";
}
else if($pw==$new_pw){
    echo "<script>alert('동일한 비밀번호 입니다.');history.back();</script>";
}
else{

    // 비밀번호 체크
    $query1 = "SELECT pw FROM user_info WHERE id='".$id."'";
    $res = mysqli_query($db_connection,$query1);

    $user_info = mysqli_fetch_array($res);
    $hash_pw = $user_info['pw'];

    if (password_verify($pw, $hash_pw)){  //비밀번호 비교
        $new_pw_hash = password_hash($new_pw, PASSWORD_DEFAULT);
        #update pw
        $query2 = "UPDATE user_info SET pw='".$new_pw_hash."' WHERE id='".$id."'";
        $res2 = mysqli_query($db_connection,$query2);
        mysqli_close($db_connection);
        echo "<script>
        alert('비밀번호가 변경되었습니다.');
        location.href='./main.php';
        </script>";
    }
    else{
        echo "<script>alert('잘못된 정보입니다.');history.back();</script>";
    }
}
?>