<?php

if (isset($_POST['reg'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (is_dir('users')) {
       
    } else {
        if (mkdir("users")) {

            if (is_dir("users/$email")) {
                echo "user already registered";
            } else {
                if (mkdir("users/$email")) {
                    if (file_put_contents("users/$email/details.txt", $password)) {
                        echo "user registered";
                    } else {
                        echo "user not registered";
                    }
                }
            }
        } else {
            echo "not Created";
        }
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
        <input type="text" name="email">
        <input type="text" name="password">
        <a href="login.php">already registered?</a>
        <input type="submit" name="reg">
    </form>

</body>

</html>