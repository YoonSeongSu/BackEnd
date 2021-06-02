<!DOCTYPE html>
<?php
    include "db_connection.php";
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b424b9c477.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>지점찾기</title>
    <style>

body{
            bottom:48px;
        }
        #map{

            width:100vw;height:100vh; min-height:500px;
        }


        .label {margin-bottom: 0px;}
        .label * {display: inline-block;vertical-align: top;}
        .label .left {background: url("https://t1.daumcdn.net/localimg/localimages/07/2011/map/storeview/tip_l.png") no-repeat;display: inline-block;height: 24px;overflow: hidden;vertical-align: top;width: 7px;}
        .label .center {background: url(https://t1.daumcdn.net/localimg/localimages/07/2011/map/storeview/tip_bg.png) repeat-x;display: inline-block;height: 24px;font-size: 15px;line-height: 24px;}
        .label .right {background: url("https://t1.daumcdn.net/localimg/localimages/07/2011/map/storeview/tip_r.png") -1px 0  no-repeat;display: inline-block;height: 24px;overflow: hidden;width: 6px;}
    </style>
</head>
<body>
    
    <form method="post" name="myLocation" action="map.php">
                    <input type="hidden" name="form_lat" value="">
                    <input type="hidden" name="form_lon" value="">
                    <input type="hidden" name="form_check" value="">
    </form>


<div class="map_wrap">
    <!-- 지도를 표시할 영역-->
    <div id="map" style="width:100%;height:100%, min-height:500px;"></div> 
    
</div>

<div class="px-0 container btn-group btn-group-lg"
        style="position: fixed; bottom: 0; left: 0;  right: 0; z-index: 100;">
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;"
            onclick="location.href='main1.php'"><i class="fas fa-home"></i></button>
        <button type="button" class="btn btn-primary " style="cursor: pointer;"
            onclick="location.href='map.php'"><i class="fas fa-map-marker-alt"></i></button>
        <button type="button" class="btn btn-primary text-muted" style="cursor: pointer;" onclick="location.href='main3.php'"><i
                class="fas fa-user"></i></button>
    <div>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6788d43e6139f6049c65c4a12e45c67a&libraries=services"></script>
<script>
    
// 마커를 담을 배열입니다
var markers = [];

var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(37.4056318, 127.11512630000001), // 지도의 중심좌표
        level: 4 // 지도의 확대 레벨
    };  

// 지도를 생성합니다    
var map = new kakao.maps.Map(mapContainer, mapOption); 

<?php
            //$form_lat = $_POST['form_lat'];
            //$form_lon = $_POST['form_lon'];
            $form_lat = 37.4056318;
            $form_lon = 127.11512630000001;
            $form_check = $_POST['form_check'];

            if ($form_check != null || $form_check != "") {
                echo "var lat = ".$form_lat.";";
                echo "var lon = ".$form_lon.";";
                echo "var post_check = '".$form_check."';";
            } else {
                echo "var lat = '';";
                echo "var lon = '';";
                echo "var post_check = 'DATA_FALSE';";
            }
        ?>
    
    if (post_check == "DATA_FALSE") {
        // HTML5의 geolocation으로 사용할 수 있는지 확인합니다 
        if (navigator.geolocation) {
            
            // GeoLocation을 이용해서 접속 위치를 얻어옵니다
            navigator.geolocation.getCurrentPosition(function(position) {
                
                lat = position.coords.latitude; // 위도
                lon = position.coords.longitude; // 경도
                    document.myLocation.form_lat.value = lat;
                    document.myLocation.form_lon.value = lon;
                    
                    document.myLocation.form_check.value = "DATA_TRUE";
                    javascript:document.myLocation.submit();
            });


                
                
            
        } else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다
            
            var locPosition = new kakao.maps.LatLng(37.4056318, 127.11512630000001),    
                message = 'geolocation을 사용할수 없어요..'
                
            displayMarker(locPosition, message);
        }
    }
    else{
        var locPosition = new kakao.maps.LatLng(lat, lon), // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
                    message = '<div style="padding:5px;">현재 내 위치</div>'; // 인포윈도우에 표시될 내용입니다
                
                // 마커와 인포윈도우를 표시합니다
                displayMarker(locPosition, message);
                    
    }
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
let positions = [];

for (let i = 0; i < locationList.length; i++) {
    positions.push(
        {
            title: locationList[i],
            latlng: new kakao.maps.LatLng(xList[i], yList[i])
        }
    );
}

// 마커 이미지 주소
let imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 
    
for (let i = 0; i < positions.length; i ++) {
    
    // 마커 이미지의 이미지 크기 입니다
    let imageSize = new kakao.maps.Size(24, 35);
    
    // 마커 이미지를 생성합니다    
    let markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize);
    
    // 마커를 생성합니다
    /*
    let marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i].latlng, // 마커를 표시할 위치
        title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage // 마커 이미지 
    });
    */
}

for (let i = 0; i < locationList.length; i++) {
    let content = '<div class ="label"><span class="left"></span><span class="center">' + locationList[i] + '</span><span class="right"></span></div>';
    let position = new kakao.maps.LatLng(xList[i], yList[i]); 

    let customOverlay = new kakao.maps.CustomOverlay({
        position: position,
        content: content   
    });

    customOverlay.setMap(map);
}


// 지도를 표시하는 div 크기를 변경하는 함수입니다
function resizeMap() {
    var mapContainer = document.getElementById('map');
    mapContainer.style.width = '650px';
    mapContainer.style.height = '650px'; 
}

function relayout() {    
    
    // 지도를 표시하는 div 크기를 변경한 이후 지도가 정상적으로 표출되지 않을 수도 있습니다
    // 크기를 변경한 이후에는 반드시  map.relayout 함수를 호출해야 합니다 
    // window의 resize 이벤트에 의한 크기변경은 map.relayout 함수가 자동으로 호출됩니다
    map.relayout();
}

// 지도에 마커와 인포윈도우를 표시하는 함수입니다
function displayMarker(locPosition, message) {

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({  
        map: map, 
        position: locPosition
    }); 
    
    var iwContent = message, // 인포윈도우에 표시할 내용
        iwRemoveable = true;

    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
        content : iwContent,
        removable : iwRemoveable
    });
    
    // 인포윈도우를 마커위에 표시합니다 
    infowindow.open(map, marker);
    
    // 지도 중심좌표를 접속위치로 변경합니다
    map.setCenter(locPosition);      
}    
/*
// 장소 검색 객체를 생성합니다
var ps = new kakao.maps.services.Places();  

// 검색 결과 목록이나 마커를 클릭했을 때 장소명을 표출할 인포윈도우를 생성합니다
var infowindow = new kakao.maps.InfoWindow({zIndex:1});

// 키워드로 장소를 검색합니다
searchPlaces();

// 키워드 검색을 요청하는 함수입니다
function searchPlaces() {

    var keyword = document.getElementById('keyword').value;

    if (!keyword.replace(/^\s+|\s+$/g, '')) {
        alert('키워드를 입력해주세요!');
        return false;
    }

    // 장소검색 객체를 통해 키워드로 장소검색을 요청합니다
    ps.keywordSearch( keyword, placesSearchCB); 
}

// 장소검색이 완료됐을 때 호출되는 콜백함수 입니다
function placesSearchCB(data, status, pagination) {
    if (status === kakao.maps.services.Status.OK) {

        // 정상적으로 검색이 완료됐으면
        // 검색 목록과 마커를 표출합니다
        displayPlaces(data);

        // 페이지 번호를 표출합니다
        displayPagination(pagination);

    } else if (status === kakao.maps.services.Status.ZERO_RESULT) {

        alert('검색 결과가 존재하지 않습니다.');
        return;

    } else if (status === kakao.maps.services.Status.ERROR) {

        alert('검색 결과 중 오류가 발생했습니다.');
        return;

    }
}

// 검색 결과 목록과 마커를 표출하는 함수입니다
function displayPlaces(places) {

    var listEl = document.getElementById('placesList'), 
    menuEl = document.getElementById('menu_wrap'),
    fragment = document.createDocumentFragment(), 
    bounds = new kakao.maps.LatLngBounds(), 
    listStr = '';
    
    // 검색 결과 목록에 추가된 항목들을 제거합니다
    removeAllChildNods(listEl);

    // 지도에 표시되고 있는 마커를 제거합니다
    removeMarker();
    
    for ( var i=0; i<places.length; i++ ) {

        // 마커를 생성하고 지도에 표시합니다
        var placePosition = new kakao.maps.LatLng(places[i].y, places[i].x),
            marker = addMarker(placePosition, i), 
            itemEl = getListItem(i, places[i]); // 검색 결과 항목 Element를 생성합니다

        // 검색된 장소 위치를 기준으로 지도 범위를 재설정하기위해
        // LatLngBounds 객체에 좌표를 추가합니다
        bounds.extend(placePosition);

        // 마커와 검색결과 항목에 mouseover 했을때
        // 해당 장소에 인포윈도우에 장소명을 표시합니다
        // mouseout 했을 때는 인포윈도우를 닫습니다
        (function(marker, title) {
            kakao.maps.event.addListener(marker, 'mouseover', function() {
                displayInfowindow(marker, title);
            });

            kakao.maps.event.addListener(marker, 'mouseout', function() {
                infowindow.close();
            });

            itemEl.onmouseover =  function () {
                displayInfowindow(marker, title);
            };

            itemEl.onmouseout =  function () {
                infowindow.close();
            };
        })(marker, places[i].place_name);

        fragment.appendChild(itemEl);
    }

    // 검색결과 항목들을 검색결과 목록 Elemnet에 추가합니다
    listEl.appendChild(fragment);
    menuEl.scrollTop = 0;

    // 검색된 장소 위치를 기준으로 지도 범위를 재설정합니다
    map.setBounds(bounds);
}

// 검색결과 항목을 Element로 반환하는 함수입니다
function getListItem(index, places) {

    var el = document.createElement('li'),
    itemStr = '<span class="markerbg marker_' + (index+1) + '"></span>' +
                '<div class="info">' +
                '   <h5>' + places.place_name + '</h5>';

    if (places.road_address_name) {
        itemStr += '    <span>' + places.road_address_name + '</span>' +
                    '   <span class="jibun gray">' +  places.address_name  + '</span>';
    } else {
        itemStr += '    <span>' +  places.address_name  + '</span>'; 
    }
                 
      itemStr += '  <span class="tel">' + places.phone  + '</span>' +
                '</div>';           

    el.innerHTML = itemStr;
    el.className = 'item';

    return el;
}

// 마커를 생성하고 지도 위에 마커를 표시하는 함수입니다
function addMarker(position, idx, title) {
    var imageSrc = 'https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/marker_number_blue.png', // 마커 이미지 url, 스프라이트 이미지를 씁니다
        imageSize = new kakao.maps.Size(36, 37),  // 마커 이미지의 크기
        imgOptions =  {
            spriteSize : new kakao.maps.Size(36, 691), // 스프라이트 이미지의 크기
            spriteOrigin : new kakao.maps.Point(0, (idx*46)+10), // 스프라이트 이미지 중 사용할 영역의 좌상단 좌표
            offset: new kakao.maps.Point(13, 37) // 마커 좌표에 일치시킬 이미지 내에서의 좌표
        },
        markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imgOptions),
            marker = new kakao.maps.Marker({
            position: position, // 마커의 위치
            image: markerImage 
        });

    marker.setMap(map); // 지도 위에 마커를 표출합니다
    markers.push(marker);  // 배열에 생성된 마커를 추가합니다

    return marker;
}

// 지도 위에 표시되고 있는 마커를 모두 제거합니다
function removeMarker() {
    for ( var i = 0; i < markers.length; i++ ) {
        markers[i].setMap(null);
    }   
    markers = [];
}

// 검색결과 목록 하단에 페이지번호를 표시는 함수입니다
function displayPagination(pagination) {
    var paginationEl = document.getElementById('pagination'),
        fragment = document.createDocumentFragment(),
        i; 

    // 기존에 추가된 페이지번호를 삭제합니다
    while (paginationEl.hasChildNodes()) {
        paginationEl.removeChild (paginationEl.lastChild);
    }

    for (i=1; i<=pagination.last; i++) {
        var el = document.createElement('a');
        el.href = "#";
        el.innerHTML = i;

        if (i===pagination.current) {
            el.className = 'on';
        } else {
            el.onclick = (function(i) {
                return function() {
                    pagination.gotoPage(i);
                }
            })(i);
        }

        fragment.appendChild(el);
    }
    paginationEl.appendChild(fragment);
}

// 검색결과 목록 또는 마커를 클릭했을 때 호출되는 함수입니다
// 인포윈도우에 장소명을 표시합니다
function displayInfowindow(marker, title) {
    var content = '<div style="padding:5px;z-index:1;">' + title + '</div>';

    infowindow.setContent(content);
    infowindow.open(map, marker);
}

 // 검색결과 목록의 자식 Element를 제거하는 함수입니다
function removeAllChildNods(el) {   
    while (el.hasChildNodes()) {
        el.removeChild (el.lastChild);
    }
}*/
</script>
</body>
</html>