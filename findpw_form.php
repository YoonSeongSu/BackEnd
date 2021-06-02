<!DOCTYPE html>
<html lang="KR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>비밀번호 찾기</title>
    <style>
         *{
            font-family: 'Jua', sans-serif;
         }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 30%;">
        <div class="my-5">
            <h2 style="text-align: center;"><small>비밀번호를 잊어버렸나요?<br>가입하신 이메일을 적어주세요.</small></h2>
        </div>
        <form id="fpw-formid" class="fpw-form" name="fpw-form" action="findpw_action.php" method="POST">

            <input class="mt-5 form-control" type="email" id="emailBox" name="id" placeholder="이메일">
            <button class="mt-3 btn btn-primary btn-block" type="submit">제 출</button>
        </form>


    </div>



</body>

</html>