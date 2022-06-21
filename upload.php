<?php

$n=md5(rand(10000,9999999999).time());
$x=sha1(rand(10000,9999999999).time());
if(isset($_POST['up'])){

    $name=$_FILES['file']['name'];
    $tname=$_FILES['file']['tmp_name'];

    $name_arr=explode(".",$name);
    $ext=end($name_arr);

    if($ext=="jpg" || $ext=="png"){
        if(move_uploaded_file($tname,"./images/$n-$x.$ext")){
            echo "File Uploaded";
        }else{   
            echo "File Not Uploaded";
        }        
    }else{
        echo "Not Valid Image";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="up">
    </form>


</body>
</html>