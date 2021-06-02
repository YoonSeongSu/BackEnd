<?php
    include "db_connection.php"; // DB 연동

    $card_no=$_POST['card_no']; // 카드이름
    $sql = "DELETE FROM user_card_info 
    WHERE info_no= ".$card_no;
    $result = mysqli_query($db_connection, $sql);

echo "
<script>
    alert ('카드가 삭제되었습니다.');
    location.href = 'cardmanage.php';
</script>";
?>