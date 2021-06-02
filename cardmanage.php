<!DOCTYPE html>
<?php
    session_start();
    include "db_connection.php";
?>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b424b9c477.js" crossorigin="anonymous"></script>
    <title>카드 관리</title>
    <style>
        * {
            font-family: 'Jua', sans-serif;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="forminfo">
        <div class="container mt-5">
            <h1>카드 관리</h1>
            <button type="button" id="btn-change" class="mt-5 btn btn-primary btn-block" data-toggle="collapse"
                data-target="#demo">카드 등록
            </button>
            <div id="demo" class="collapse my-2">
                <table class="table">

                    <!--여기서 등록하면 밑에 카드목록으로 저장되게 해줘-->
                    <!--성수형 여기부분이 카드사 카드 변경이야 아마 js도 건드려야할거야-->
                    <form action="cardmanage_action.php" method="POST" id="myForm">
                        <tbody>
                            <tr>
                                <td style="width: 190.5px;">
                                    <div class="dropdown">
                                        <select class="form-control" id="select1" name="card_cmp">
                                                <!--이 부분을 동적으로 해야해-->                                                
                                                <option value="카드사" selected>카드사</option>
                                                        <?php


                                                        $sql = "SELECT DISTINCT companies FROM card_info";
                                                        $result = mysqli_query($db_connection, $sql);
                                                        $result_count = mysqli_num_rows($result);


                                                        while($row = mysqli_fetch_array($result)){
                                                            $card_company = $row['companies'];
                                                            echo "<option value = '".$card_company."'>".$card_company."</option>";
                                                        }
                                                        ?>
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 190.5px;">
                                    <div class="dropdown">
                                        <select class="form-control" id="select2" name="card_name">
                                            <option value="카드" selected>카드</option>
                                      
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <button class="btn btn-primary btn-block" id="submit-card"
                                        type="submit">등록</button>
                                </td>
                            </tr>
                        </tbody>
                    </form>

                </table>
            </div>
            <button type="button" id="btn-search" class="mt-3 btn btn-primary btn-block" data-toggle="collapse"
                data-target="#demo2">카드 조회
            </button>
            <div class="container">
                <div id="demo2" class="collapse my-3">
                    <form action="carddelete_action.php" method="POST" >
                        
                <table class="table" id="thistb">
                        <thead>
                            <tr>
                                <th>내 카드</th>
                            </tr>
                        </thead>
                        <tbody id="info_tbody">
                            <?php
                                
                                $user_id = $_SESSION['user_id'];
                                $card_sql = "SELECT info_no, card_name, card_company FROM user_card_info 
                                             WHERE user_id = '".$user_id."';";  
                                             echo "<script>console.log('".$card_sql."');</script>";
                                 $card_result = mysqli_query($db_connection, $card_sql);
                                 
                                 while($card_row = mysqli_fetch_array($card_result)){
                                     $info_no = $card_row['info_no'];
                                    $card_company = $card_row['card_company'];
                                    $card_name = $card_row['card_name'];

                                echo '<tr><td>['.$card_company.'] '.$card_name.'<button type="submit" class="btn btn-danger float-right btn-sm" name="card_no" value="'.$info_no.'">삭제</button></td></tr>';
                                    
                                 }
                                
                            ?>
                                                        
                        </tbody>
                    </table>
                                </form>
                    <!-- -----------------체크박스로 할때--------------------
                    <form action="여기" method="POST" id="myForm">
                        <div class="dropdown">
                            <ul class="list-group">
                               data-tr_value로 각각 벨류 이거있어야 삭제기능가능
                                    <li data-tr_value="1" class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            체크박스 기능
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" value="1"
                                                name="checkRow">
                                                카드 목록
                                            <label class="custom-control-label" for="customCheck1">1카드</label>
                                        </div>
                                    </li>
                                    <li data-tr_value="2" class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" value="2"
                                                name="checkRow">
                                            <label class="custom-control-label" for="customCheck2">2카드</label>
                                        </div>
                                    </li>
                                    <li data-tr_value="3" class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" value="3"
                                                name="checkRow">
                                            <label class="custom-control-label" for="customCheck3">3카드</label>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                            <input type="button" class="mt-3 btn btn-primary float-right" id="delete" value="카드 삭제">-->

                </div>

                </form>

            </div>
        </div>
    </div>

    
    <script>
            //여기를 db값 받아서 해야할거야
            $(document).ready(function() {
                <?php

                    $info_sql = "SELECT DISTINCT companies FROM card_info";
                    $info_result = mysqli_query($db_connection, $info_sql);
                    $info_result_count = mysqli_num_rows($info_result);
                    $card_info_list=[];

                    while($info_row = mysqli_fetch_array($info_result)){
                        $card_company = $info_row['companies'];
                        array_push($card_info_list, $card_company);
                    }
                    for($i=0; $i < $info_result_count; $i++){
                        $sql = "SELECT DISTINCT card_name FROM card_info WHERE companies= '".$card_info_list[$i]."'";
                        $result = mysqli_query($db_connection, $sql);
                        $result_count = mysqli_num_rows($result);
    
                        $card_name_list=[];
                        
    
                        while($row = mysqli_fetch_array($result)){
                            $card_name = $row['card_name'];
                            array_push($card_name_list, $card_name);
                        }
                        echo "let card_".$card_info_list[$i]."_name = ".json_encode($card_name_list, JSON_UNESCAPED_UNICODE).";";
                        echo "let card_".$card_info_list[$i]."_value = ".json_encode($card_name_list, JSON_UNESCAPED_UNICODE).";";
                    }
                   
                ?>


            let card_default_name = ["카드"];
            let card_default_value = [""];

            let sub_name;
            let sub_value;

            let index = 0;

            let select_item = $('#select1').val();

            $('#select1').change(function() {
                select_item = $('#select1').val();


                
                if (select_item == 'KB') {
                    sub_name = card_KB_name;
                    sub_value = card_KB_value;
                } else if (select_item == 'Other') {
                    sub_name = card_Other_name;
                    sub_value = card_Other_value;
                } else if (select_item == 'Woori') {
                    sub_name = card_Woori_name;
                    sub_value = card_Woori_value;
                } else if (select_item == 'NH') {
                    sub_name = card_NH_name;
                    sub_value = card_NH_value;
                } else if (select_item == 'SC') {
                    sub_name = card_SC_name;
                    sub_value = card_SC_value;
                } else if (select_item == 'Samsung') {
                    sub_name = card_Samsung_name;
                    sub_value = card_Samsung_value;
                } else if (select_item == 'Citi') {
                    sub_name = card_Citi_name;
                    sub_value = card_Citi_value;
                } else if (select_item == 'Shinhan') {
                    sub_name = card_Shinhan_name;
                    sub_value = card_Shinhan_value;
                } else if (select_item == 'Hana') {
                    sub_name = card_Hana_name;
                    sub_value = card_Hana_value;
                } else if (select_item == 'Hyundai') {
                    sub_name = card_Hyundai_name;
                    sub_value = card_Hyundai_value;
                } else if (select_item == 'Lotte') {
                    sub_name = card_Lotte_name;
                    sub_value = card_Lotte_value;
                } else if (select_item == 'IBK') {
                    sub_name = card_IBK_name;
                    sub_value = card_IBK_value;
                } else {
                    sub_name = card_default_name;
                    sub_value = card_default_value;
                }

                $('#select2').empty();

                for (let i = 0; i < sub_name.length; i++) {
                    let option = $("<option value='" + sub_value[i] + "'>" + sub_name[i] + "</option>");
                    $('#select2').append(option);
                }
            });
             //추가
             $("#submit-card").click(function(){
                /*append 안에 추가버튼 누를 때 나오는 것들
                /이거는 위에 카드속성 가져온거라 db에 있는걸로 바꾸려면
                /$("#select2 option:selected").text() 부분 바꾸면 될꺼야*/
                $('#thistb>tbody:last').append('<tr><td>'+$("#select2 option:selected").text()+'<input type="button" class="btn btn-danger float-right btn-sm" name="delete"id="delete" value="삭제"></td></tr>')
            })
            //삭제
            $("#info_tbody").on("click", "#delete", function () {
                $(this).parent().parent().remove()
        });
    });
    </script>
    <span class="px-0 container btn-group btn-group-lg fixed-bottom">
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;" onclick="location.href='main1.php'"><i
                class="fas fa-home"></i></button>
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
            onclick="location.href='map.php'"><i class="fas fa-map-marker-alt"></i></button>
        <button type="button" class="btn btn-primary " style="cursor: pointer;"
            onclick="location.href='main3.php'"><i class="fas fa-user"></i></button>
    </span>
</body>

</html>