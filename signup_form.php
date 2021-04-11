<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title> 회원가입</title>
    <link rel="stylesheet" href="new_main.css">
</head>
 
<body>
    <form action = "signup_action.php" method = "POST">
    <!-- wrapper -->
    <div id="wrapper">
       
        <!-- content-->
        <div id="content">

            <!-- ID -->
            <div>
                <h3 class="join_title">
                    <label for="email">이메일</label>
                </h3>
                <span class="box int_id">
                    <input type="email" id="email" name="email" class="int" maxlength="30">
                </span>
                <span class="error_next_box"></span>
            </div>

            <!-- PW1 -->
            <div>
                <h3 class="join_title"><label for="pswd1">비밀번호</label></h3>
                <span class="box int_pass">
                    <input type="password" id="pswd1" name="password" class="int" maxlength="20">
                    <span id="alertTxt">사용불가</span>
                    <img src="m_icon_pass.png" id="pswd1_img1" class="pswdImg">
                </span>
                <span class="error_next_box"></span>
            </div>

            <!-- PW2 -->
            <div>
                <h3 class="join_title"><label for="pswd2">비밀번호 재확인</label></h3>
                <span class="box int_pass_check">
                    <input type="password" id="pswd2" class="int" maxlength="20">
                    <img src="m_icon_check_disable.png" id="pswd2_img1" class="pswdImg">
                </span>
                <span class="error_next_box"></span>
            </div>

            <!-- NAME -->
            <div>
                <h3 class="join_title"><label for="name">이름</label></h3>
                <span class="box int_name">
                    <input type="text" id="name" name="name" class="int" maxlength="20">
                </span>
                <span class="error_next_box"></span>
            </div>

            <!-- address -->
            <div>
                <h3 class="join_title">
                    <label for="address">주소</label>
                </h3>
                <span class="box int_address">
                    <input type="text" id="address" name="address" class="int">
                </span>
                <span class="error_next_box"></span>
            </div>

            <!-- JOIN BTN-->
            <div class="btn_area">
                <button type="submit" id="btnJoin">
                    가입하기
                </button>
            </div>

        </div>
        <!-- content-->

    </div>
    <!-- wrapper -->
    <script src="main.js"></script>
    </form>
    </body>
</html>