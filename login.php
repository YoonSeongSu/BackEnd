<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>니카추</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">

</head>

<body>

    <section class="login-form">
        <div class="formLog">
            <h1 class="img"><img src=cardImage.png></h1>
            <form id="formIdLogin" class="formLogin" name="formLogin" action="login_ok.php" method="POST">

                <input type="email" id="emailBox" name="user_id" class="text-field" placeholder="이메일">

                <input type="password" id="pwBox" name="user_pw" class="text-field" placeholder="비밀번호">

                <button type="submit" class="submit-btn">로그인</button>
                <div class="links">
                    <a target="_self" id="join" href="signup_form.php">회원가입</a>
                    <a target="_self" id="idTarget" href="findpw_form.php">비밀번호 찾기</a>
                </div>
            </form>
        </div>

    </section>
</body>

</html>