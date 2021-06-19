<?php
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
    $con=mysqli_connect("192.168.0.3","landy","b0827213","webproject");
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
