<?php
$req_method=$_SERVER['REQUEST_METHOD'];

if($req_method=="POST"){
    $res=["status"=>200,"msg"=>$_POST['name']];
}else{
    $res=["status"=>400,"msg"=>"Only Post Allowed"];
    
}

echo json_encode($res);

?>