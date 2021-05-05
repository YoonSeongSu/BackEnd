<?php

    session_start();

    if(isset($_SESSION['user_id'])){
        echo "세션저장 : ".$_SESSION['user_id'];
    }
    else{ 
        echo "세션x";
    }
?>
