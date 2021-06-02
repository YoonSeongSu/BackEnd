<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=7cwolbn7i3"></script>

    <style>
        body {
            margin: 0;
        }

        #map {
            width: 100vw;
            height: 100vh;
            bottom: 0px;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        var lat;
        var lon;
        
        var mapOptions = {
            center: new naver.maps.LatLng(37.1798924, 128.194890),
            zoom: 15 // 지도 확대 레벨
        };
        var map = new naver.maps.Map('map', mapOptions);
        if (navigator.geolocation) {
            
            // GeoLocation을 이용해서 접속 위치를 얻어옵니다
            navigator.geolocation.getCurrentPosition(function(position) {
                
                lat = position.coords.latitude; // 위도
                lon = position.coords.longitude; // 경도
                map.setCenter(new naver.maps.LatLng(lat,lon));
                var marker = new naver.maps.Marker({
                    position: new naver.maps.LatLng(lat, lon),
                    map: map
                });
            });      
        }
        var markers = [];
        
    </script>
    <?php
    
        
    $point_x = $_POST['form_lat'];
    $point_y = $_POST['form_lon'];
    /*if ($point_x == null || $point_x == "" )
    {
        echo "javascript:document.myLocation.submit();";
    }*/

    $point_range = "0.02";  //주변범위
    
    //계산식
    $point_leftx = (double)$point_x - (double)$point_range;
    $point_rightx = (double)$point_x + (double)$point_range;
    $point_topy = (double)$point_y + (double)$point_range;
    $point_bottomy = (double)$point_y - (double)$point_range;

    $sql = "SELECT store_brand, store_name, store_pointx, store_pointy
            FROM store_info
            WHERE store_pointx > ".$point_leftx."
            AND store_pointx < ".$point_rightx."
            AND store_pointy < ".$point_topy."
            AND store_pointy > ".$point_bottomy;
    $result = mysqli_query($db_connection, $sql);
    $result_count = mysqli_num_rows($result);

    $store_name_list = [];
    $store_pointx_list = [];
    $store_pointy_list = [];


    while ($store_info = mysqli_fetch_array($result)) {
        $store_brand = $store_info['store_brand'];
        $store_name = $store_info['store_name'];
        $store_pointx = $store_info['store_pointx'];
        $store_pointy = $store_info['store_pointy'];

        array_push($store_name_list, $store_brand." ".$store_name);
        array_push($store_pointx_list, $store_pointx);
        array_push($store_pointy_list, $store_pointy);
    }

    echo "let locationList = ".json_encode($store_name_list, JSON_UNESCAPED_UNICODE).";\n";
    echo "let xList = ".json_encode($store_pointx_list).";\n";
    echo "let yList = ".json_encode($store_pointy_list).";\n";

?>
<script>
    let positions = [];

    for (let i = 0; i < locationList.length; i++) {
    positions.push(
        {
            title: locationList[i],
            latlng: new kakao.maps.LatLng(xList[i], yList[i])
        }
    );
}
</script>

    <div class="px-0 container btn-group btn-group-lg"
        style="position: fixed; bottom: 0; left: 0;  right: 0; z-index: 100;">
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
            onclick="location.href='main1.php'"><i class="fas fa-home"></i></button>
        <button type="button" class="btn btn-primary " style="cursor: pointer;"
            onclick="location.href='map.php'"><i class="fas fa-map-marker-alt"></i></button>
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;" onclick="location.href='main3.php'"><i
                class="fas fa-user"></i></button>
    <div>
</body>
</html>