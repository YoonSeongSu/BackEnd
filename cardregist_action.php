<?php
session_start();
include "db_connection.php"; // DB 연동

$card_name=$_POST['card_name']; // 카드이름
$card_cmp=$_POST['card_cmp'];   // 카드회사
$user_id = $_SESSION['user_id'];

if($card_name == '' || $card_cmp == '')
{
    echo "<script>alert('공백은 입력할 수 없습니다.');history.back();</script>";
}
else{
    $sql = "
        INSERT INTO user_card_info
        (user_id, card_name, card_cmp, card_reg)
        VALUES('".$user_id."', '".$card_name."', '".$card_cmp."', now())
        ";           // 카드등록 쿼리문

    $result = mysqli_query($db_connection, $sql);



    if ($result === false) {
        echo"
        <script>
        alert ('카드 등록에 실패하였습니다');
        </script>";
        echo mysqli_error($db_connection);
    } else {
        echo "
        <script>
            alert ('카드가 등록되었습니다');
            location.href = 'cardregist_form.php';
        </script>";
    }
}
?>