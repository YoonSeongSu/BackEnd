<!DOCTYPE html>
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

</html>