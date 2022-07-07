<?php
$genders = ["male", "female", "others"];

include_once "conn.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $get_student_sql = "select * from students where student_id='$id'";

    $get_student_query = mysqli_query($conn, $get_student_sql);

    if (mysqli_num_rows($get_student_query) > 0) {
        $get_student = mysqli_fetch_assoc($get_student_query);
    } else {

        header("location:index.php");
    }
} else {
    header("location:index.php");
}



if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $upd_student_sql = "update students set name='$name',email='$email',gender='$gender' where student_id='$id'";

    if (mysqli_query($conn, $upd_student_sql)) {
        header("location:index.php");
    } else {
        echo "not updated";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <div class="container my-5">
        <h1 class="text-center my-5">Update Student</h1>

        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input autocomplete="off" value="<?= $get_student['name'] ?>" name="name" type="text" class="form-control">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" value="<?= $get_student['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <select name="gender" class="form-control">
                    <?php
                    foreach ($genders as $g) {
                        if ($g == $get_student['gender']) {
                    ?>

                            <option selected value="<?= $g ?>"><?= ucwords($g) ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $g ?>"><?= ucwords($g) ?></option>
                    <?php }
                    }

                    ?>
                </select>
            </div>

            <button type="submit" name="add" class="btn btn-primary">Submit</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


</body>

</html>