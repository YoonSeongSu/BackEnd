<?php

    include "db_connection.php";

    $sql = "SELECT DISTINCT companies FROM card_info";
    $result = mysqli_query($db_connection, $sql);
    $result_count = mysqli_num_rows($result);


    while($row = mysqli_fetch_array($result)){
        $card_company = $row['companies'];
        echo $card_company."<br>";
    }
?>