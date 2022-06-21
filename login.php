<?php
session_start();

if(isset($_SESSION['email'])){
    header("location:welcome.php");
}

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(is_dir("users/$email")){
        

        $fo=fopen("users/$email/details.txt","r");

        $op=fgets($fo);

        if(password_verify($password,$op)){
            $_SESSION['email']=$email;
            header("location:welcome.php");

        }else{
            echo "please enter valid password";

        }


    }else{
        
        echo "Not Exists";
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


    <form method="post">
        <input type="text" name="email" required>
        <input type="text" name="password" required>
        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>