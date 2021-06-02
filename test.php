<script>
    <?php
    
        include "db_connection.php";
        
        // 삼성코엑스 좌표
        $point_x = "37.5118081";
        $point_y = "127.059135";
        $point_range = "0.004";  //주변범위
        
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
            $store_name = $store_info['store_name'];
            $store_pointx = $store_info['store_pointx'];
            $store_pointy = $store_info['store_pointy'];

            array_push($store_name_list, $store_name);
            array_push($store_pointx_list, $store_pointx);
            array_push($store_pointy_list, $store_pointy);
        }

        echo "let locationList = ".json_encode($store_name_list, JSON_UNESCAPED_UNICODE).";\n";
        echo "let xList = ".json_encode($store_pointx_list).";\n";
        echo "let yList = ".json_encode($store_pointy_list).";\n";

    

    ?>
</script>
