<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>니카추</title>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        *{
            outline: none;
            text-decoration: none;
            font-family: 'Jua', sans-serif;
        }
    </style>

</head>

<body>

    <div class="container">
        <h1><img class="my-5 py-5 mx-auto d-block" src=logo.png width="30%"></h1>
        <form id="formIdLogin" class="form-group" name="form-group" action="login_ok.php" method="POST">
            <input type="email" id="emailBox" name="user_id" class="mt-5 form-control" placeholder="이메일">
            <input type="password" id="pwBox" name="user_pw" class="my-2 form-control" placeholder="비밀번호">
            <div class="form-group form-check">
                <label class="container form-check-label my-2">
                    <input class=" form-check-input" type="checkbox"> 아이디 저장
                </label>
            </div>
            <button type="submit" class="mb-3 btn btn-primary btn-block btn-lg">로그인</button>
            <div class="container" style="text-align: center;">
                <a class="container" target="_self" id="join" href="signup_form.php">회원가입</a>
                <a class="container" target="_self" id="idTarget"
                    href="findpw_form.php">비밀번호 찾기</a>
            </div>
        </form>
    </div>

</body>

</html>