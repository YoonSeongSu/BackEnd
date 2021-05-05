<!DOCTYPE html>
<html lang="KR">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="findpw.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">
    <title>비밀번호 찾기</title>
</head>
<body>
    <section class="findpw-form">
        <div class=formfpw>
            <div class="title">
                <h3>비밀번호를 잊어버렸나요?<br>가입하신 이메일을 적어주세요.</h3>
            </div>
            <form id="fpw-formid" class="fpw-form" name="fpw-form" action="findpw_action.php" method="POST">
                
                <input class="email" type="email" id="emailBox" name="id"  placeholder="이메일">
                <button class="submit-btn" type="submit" >제 출</button>
            </form>
        </div>
    </section>
</body>
</html>