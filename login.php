
<html>

<head>
    <title>니카추</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="id.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">

</head>

<body>

    <section class="login-form">
        <div class="formLog">
            <h1 class="img"><img src="cardImage.png"></h1>
            <form id="formIdLogin" class="formLogin" name="formLogin" action="login_ok.php" method="POST">

                <input type="text" id="user_id" name="user_id" class="text-field" placeholder="아이디">

                <input type="password" id="user_pw" name="user_pw" class="text-field" placeholder="비밀번호">

                <button type="submit" class="submit-btn">로그인</button>
                <div class="links">
                    <a target="_self" id="join" href="#">회원가입</a>
                    <a target="_self" id="idTarget" href="#">비밀번호 찾기</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>