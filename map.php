<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카카오 지도 시작</title>
    <style>

        body{
            margin:0px;
        }
        #map{

            width:100vw;height:100vh; min-height:500px;
        }
    </style>
</head>
<body>
    
    <!-- 지도를 표시할 영역-->
    <div id="map" style="width:100%;height:100%, min-height:500px;"></div> 

    <!-- 실제 지도를 그리는 API-->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6788d43e6139f6049c65c4a12e45c67a"></script>

    <!-- 지도를 띄우는 코드 생성-->
    <script>
    var container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
    var options = { //지도를 생성할 때 필요한 기본 옵션
	center: new kakao.maps.LatLng(37.40217820057122, 127.1085536962476), //지도의 중심좌표.
	level: 3 //지도의 레벨(확대, 축소 정도)
    };
    37.40217820057122, 127.1085536962476
    //지도 생성 및 객체 리턴
    var map = new kakao.maps.Map(container, options); 

    // 마커가 표시될 위치입니다 
    var markerPosition  = new kakao.maps.LatLng(37.40217820057122, 127.1085536962476); 

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: markerPosition
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);







</script>

</body>
</html>