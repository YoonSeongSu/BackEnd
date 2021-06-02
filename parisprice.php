<!DOCTYPE html>
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
    <title>가격비교</title>
    <style>
        * {
            font-family: 'Jua', sans-serif;
            outline: none;
            text-decoration: none;
        }
        hr{
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="my-2 container">
        <div style="text-align: center;">
            <div class="ml-1 mt-1" style="text-align: left; font-size: 30px; position: fixed;">
                <!--주소 할당해줘-->
                <a href="main1.php"><i class="fas fa-angle-left text-muted"></i></a>
            </div>
            <!--로고 사진-->
                <img src="paris.png" width="40%">
        </div>

        <div id="menu">
            <div class="my-4 container" style="text-align: center;">
                <span>
                    <!--대표 메뉴-->
                    <!--대표메뉴도 동적으로-->
                    <h5 class="py-1 bg-dark rounded text-white">치즈케이크 25000￦</h5>
                </span>
            </div>
        </div>
        </table>
        <div>
            <div class="my-3 container">
                <img class="img mb-1" src=goldmedal.png width="11%">
                <div class="mb-3 border border-0" style="text-align: center;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="cardimage" style="width: 20%; padding:0; border: none;">
                                    <div>
                                        <img class="img" id="img1" src="card_11.png" width="100%">
                                    </div>
                                </td>


                                <td id="card1" style="border: none; display:table-cell; vertical-align:middle;">
                                    <h5 class="text-muted">KT 멤버쉽</h5>
                                    <h4 style="margin: 0;"><strong>
                                        <!--가격, 할인금액 동적으로-->

                                            3500원</strong> <span style="color: #048de7;">(-600)</span>

                                    </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="container">
                <hr>
            </div>
            <div class="my-3 container">
                <img class="img mb-1 " src=silvermedal.png width="11%">
                <div class="mb-3 border border-0" style="text-align: center;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="cardimage" style="width: 20%; padding:0; border: none;">
                                    <div>
                                        <img class="img float-left" id="img2" src="card_12.png" width="100%">
                                    </div>
                                </td>


                                <td id="card2" style="border: none; display:table-cell; vertical-align:middle;">
                                    <!--카드이름 제일긴거 넣어서 사이즈확인한거야-->
                                    <h5 class="text-muted">카드의 정석 다이렉트(구, 다모아 할인 다이렉트)</h5>
                                    <h4 style="margin: 0;">
                                        3700원 <span style="color: #048de7;">(-400)</span>
                                    </h4>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="container">
                <hr>
            </div>
            <div class="my-3 container">
                <img class="img mb-1" src=bronzemedal.png width="11%">
                <div class="mb-3 border border-0" style="text-align: center;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="cardimage" style="width: 20%; padding: 0; border: none;">
                                    <div>
                                        <img class="img float-left" id="img3" src="card_13.png" width="100%">
                                    </div>
                                </td>


                                <td id="card3" style="border: none; display:table-cell; vertical-align:middle;">
                                    <h5 class="text-muted">광주상생 카드</h5>
                                    <h4 style="margin: 0;">
                                        3900원 <span style="color: #048de7;">(-200)</span>
                                    </h4>

                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


</body>

</html>