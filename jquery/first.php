<?php
// date_default_timezone_set("Asia/Kolkata");
// echo date("H:i:s");

if(isset($_POST['name'])){
    if(strlen($_POST['name']) > 0){
        $res=["status"=>200,"msg"=>$_POST['name']];
    }else{
        $res=["status"=>400,"msg"=>"Please Fill Your Name"];
        
    }
}else{
    $res=["status"=>400,"msg"=>"POST RQT Accepted"];

}



echo json_encode($res);
?>