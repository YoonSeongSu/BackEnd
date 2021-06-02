<!DOCTYPE html>
<html lnag="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> 메인화면 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2ed27ac52f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Jua', sans-serif;
            outline: none;
            text-align: center;
        }
        body{
            margin: 20px;
        }
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        
        table {
            width: 100%;
            text-align: center;
        }

        img {
            width: 100%;
        }

        tr {
            border: none;
        }

        td {
            border: none;
            width: 100px;
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="mt-4">
        <img src="logo3.png" style="width: 80%;">
    </div>
    <div class="container">
        
        <div id="demo" class="container carousel slide" data-ride="carousel">
            <hr>

            <!-- 카드 수 -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>

            <!-- 이미지 -->
            <div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="card_1.png">
                    </div>
                    <div class="carousel-item">
                        <img src="card_1.png">
                    </div>
                    <div class="carousel-item">
                        <img src="card_2.png">
                    </div>
                    <div class="carousel-item">
                        <img src="card_3.png">
                    </div>
                </div>
            </div>


            <!-- 왼쪽 오른쪽 버튼 -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

            <hr>
        </div>
        <div class="my-1 container" style="text-align: center;">
            <!--href도 링크해주세용-->
            <table>
                <tbody>
                    <tr>
                        <td class="p-4"><a href="starprice.php">
                                <img src="SB.png"></a></td>
                        <td class="p-4"><a href="baskinprice.php">
                                <img src="BR.png"></a></td>
                    </tr>
                    <tr>
                        <td class="p-4"><a href="parisprice.php">
                                <img src="PB.png"></a></td>
                        <td class="p-4"><a href="outbackprice.php">
                                <img src="OB.png"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>





        <footer class="px-0 container btn-group btn-group-lg"
            style="position: fixed; bottom: 0; left: 0;  right: 0; z-index: 100;">
            <button type="button" class="btn btn-primary" style="cursor: pointer;" onclick="location.href='main1.php'"><i
                    class="fas fa-home"></i></button>
            <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
                onclick="location.href='map.php'"><i class="fas fa-map-marker-alt"></i></button>
            <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
                onclick="location.href='main3.php'"><i class="fas fa-user"></i></button>
            </footer>
    </div>

</body>

</html>