<?php
include_once "conn.php";

$get_students_sql = "select * from students";

$get_students_query = mysqli_query($conn, $get_students_sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>

    <a href="insert.php">Insert Student</a>
    <table border="1" id="dt">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Admit On</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($get_students = mysqli_fetch_assoc($get_students_query)) {

        ?>
            <tr>
                <th><?= $i++ ?></th>
                <td>
                    <?= ucwords($get_students['name']) ?>
                </td>
                <td>
                    <?= $get_students['email'] ?>
                </td>
                <td>
                    <?= $get_students['gender'] ?>
                </td>
                <td>
                    <?= $get_students['admit_on'] ?>
                </td>
            </tr>
        <?php

        }


        ?>
        </tbody>
    </table>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dt').DataTable();
        });
    </script>
</body>

</html>