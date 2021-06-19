<?php
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
    $con=mysqli_connect("34.204.76.156","yutzu","b0827213","webproject","3306")or die('連接數據庫失敗！');
    if($con){
        $sql="select * from restaurant_list";
        $result = mysqli_query($con,$sql);
        if($result){
            $i=0;
            while($row=mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['name']=$row['name'];
                $response[$i]['location']=$row['location'];                
                $response[$i]['phone']=$row['phone'];
                $i++;
            }
            echo json_encode($response,JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
        }
    }
    else{
        echo "connected failed";
    }
?>
