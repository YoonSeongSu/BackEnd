<!--<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainview3.css">
    <title>내 정보</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b424b9c477.js" crossorigin="anonymous"></script>
</head>

<body>

        <div class="forminfo">

            <ul class="links">
                <li>
                    <a target="_self" id="pwChange" href="changepw_form.php">
                        <div class="pwCh">비밀번호 변경</div>
                    </a>
                </li>
                <li>
                    <a target="_self" id="cardReg" href="cardregist_form.php">
                        <div class="pwCh">카드 등록</div>
                    </a>
                </li>
            </ul>

            <div class="image">
                <img src="logo.png">
            </div>
            <div class="menu_wrap">
                <nav class="menu_nav">
                    <ul class="menu_bar">
                        <li class="home" style="cursor: pointer;" onclick="location.href='홈주소'"><i
                                class="fas fa-home"></i></li>
                        <li class="map" style="cursor: pointer;" onclick="location.href='map.php'"><i
                                class="fas fa-map-marker-alt"></i></li>
                        <li class="my" style="cursor: pointer;" onclick="location.href='정보주소'"><i
                                class="fas fa-user"></i></li>
                    </ul>

            </div>
        </div>
 
</body>

</html>-->
<!DOCTYPE html>
<?php
    include "db_connection.php";
?>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b424b9c477.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <style>
        * {
            font-family: 'Jua', sans-serif;
            outline: none;
        }
        body{
            margin: 20px;
        }
    </style>
</head>

<body>

    <div class="forminfo">


        <div class="container mt-5">
            <h1>개인 설정</h1>
            <button type="button" class="mt-5 btn btn-primary btn-block" data-toggle="collapse" data-target="#demo">비밀번호
                변경</button>
            <div id="demo" class="collapse">
                <!--주소 연결해줘-->
                <form action="changepw_action.php" method="POST" id="myForm">
                    <div class="form-group has-feedback">
                        <label class="control-label" for="pw"><strong>기존 비밀번호</strong></label>
                        <input class="form-control" type="password" name="pw" id="pw" />
                        <span id="rePwdErr" class="help-block">비밀번호와 일치하지 않습니다. 다시 입력해 주세요.</span>
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback my-2">
                        <label class="control-label" for="new_pw"><strong>새로운 비밀번호</strong></label>
                        <input class="form-control" type="password" name="new_pw" id="new_pw" />
                        <span id="pwdRegErr" class="help-block">8글자 이상 입력하세요.</span>
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <button class="btn btn-primary" onclick="" id="submit-change" type="submit">변경</button>
                </form>
            </div>
            <a href="cardmanage.php" id="btn-change" class="mt-3 btn btn-primary btn-block" role="button"
                    data-target="#demo2">카드 관리 </a>
            <div id="demo2" class="collapse my-2">
                <table class="table">

                    <!--성수형 여기부분이 카드사 카드 변경이야 아마 js도 건드려야할거야-->
                    <form action="여기" method="POST" id="myForm">
                        <tbody>
                            <tr>
                                <td style="width: 190.5px;">
                                    <div class="dropdown">
                                        <select class="form-control" id="select1" name="select1">
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
                                        <select class="form-control" id="select2" name="select2">
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


        </div>


    </div>


    <!--네비바-->
    <!--href부분 주소 할당해줘-->
    <div class="px-0 container btn-group btn-group-lg"
        style="position: fixed; bottom: 0; left: 0;  right: 0; z-index: 100;">
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
            onclick="location.href='main1.php'"><i class="fas fa-home"></i></button>
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
            onclick="location.href='map.php'"><i class="fas fa-map-marker-alt"></i></button>
        <button type="button" class="btn btn-primary" style="cursor: pointer;" onclick="location.href='main3.php'"><i
                class="fas fa-user"></i></button>
    <div>
            
        <script>
            //여기를 db값 받아서 해야할거야
            
        //^여기까지


            $("#card-com").change(function(){
                $("#card-com dromdown-m1" )
            })
            $("#rePwdErr").hide();
            //정규식
            var reg = /^.{8,}$/;
            $("#pwd").keyup(function () {
                var pwd = $(this).val();

                if (reg.test(pwd)) {//정규표현식을 통과 한다면
                    $("#pwdRegErr").hide();
                    successState("#pwd");
                    if (rePwd == pwd) {//비밀번호 같다면
                        $("#rePwdErr").hide();
                        successState("#rePwd");
                    } else {//비밀번호 다르다면
                        $("#rePwdErr").show();
                        errorState("#rePwd");
                    }
                }
                else {//정규표현식을 통과하지 못하면
                    $("#pwdRegErr").show();
                    errorState("#pwd");
                }
            });
            $("#rePwd").keyup(function () {
                var rePwd = $(this).val();
                var pwd = $("#pwd").val();
                // 비밀번호 같은지 확인
                if (reg.test(pwd)) {//정규표현식을 통과 한다면
                    $("#pwdRegErr").hide();
                    successState("#pwd");
                    if (rePwd == pwd) {//비밀번호 같다면
                        $("#rePwdErr").hide();
                        successState("#rePwd");
                    } else {//비밀번호 다르다면
                        $("#rePwdErr").show();
                        errorState("#rePwd");
                    }
                }
                else {//정규표현식을 통과하지 못하면
                    $("#pwdRegErr").show();
                    errorState("#pwd");
                }
            });
        
            // 성공 상태로 바꾸는 함수

            function successState(sel) {
                $(sel)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find(".glyphicon")
                    .removeClass("glyphicon-remove")
                    .addClass("glyphicon-ok")
                    .show();

                $("#myForm button[type=submit]")
                    .removeAttr("disabled");
            };
            // 에러 상태로 바꾸는 함수
            function errorState(sel) {
                $(sel)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error")
                    .find(".glyphicon")
                    .removeClass("glyphicon-ok")
                    .addClass("glyphicon-remove")
                    .show();

                $("#myForm button[type=submit]")
                    .attr("disabled", "disabled")
            };

        </script>

</body>

</html>