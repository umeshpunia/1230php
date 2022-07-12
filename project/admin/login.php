<?php
include_once "./includes/db.php";
include_once "./functions/main.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_user_sql = "select * from admin_users where email='$email' and status='active'";
    $login_user_query = mysqli_query($conn, $login_user_sql);
    if ($login_user_query) {

        if (mysqli_num_rows($login_user_query) > 0) {
            $login_user = mysqli_fetch_assoc($login_user_query);
            // password matching
            if(password_verify($password,$login_user['password'])){
                $_SESSION['email']=$email;
               redirect("index.php");
            }else{

                $msg = "Please Enter Valid Details2";
            }


        } else {
            $msg = "Please Enter Valid Details1";
        }
    } else {
        $msg = "Please Enter Valid Details";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="jumbotron text-center bg-custom jumbotron-fluid text-white">
        <h1>Login Page</h1>
        <h2>Please Enter Details</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <h2 class="<?= $class_name ?>"><?= ucwords($msg) ?></h2>
                    <button type="submit" name="login" class="btn btn-success">Login</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>

</html>