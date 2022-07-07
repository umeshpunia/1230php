<?php
include_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $ins_student_sql = "INSERT INTO `students` (`name`, `email`, `gender`) VALUES ('$name', '$email', '$gender')";

    if (mysqli_query($conn, $ins_student_sql)) {
        $res=["status"=>200,"msg"=>"Addedd Successfully"];
    } else {
        $res=["status"=>500,"msg"=>"Not Added"];
    }

    echo json_encode($res);
}
