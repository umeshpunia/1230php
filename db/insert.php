

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
    <h1 class="text-center my-5">Add Student</h1>

    <form method="post" id="addForm">
        <div class="form-group">
            <label>Name</label>
            <input autocomplete="off" id="name" type="text" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <select id="gender" class="form-control">
                <option selected disabled>Choose Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
        </div>

        <button type="submit" id="add" class="btn btn-primary">Submit</button>
    </form>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        
        $('#addForm').submit(function(e){
            e.preventDefault();
            name=$('#name').val();
            email=$('#email').val();
            gender=$('#gender').val();

            data={name,email,gender}

            $('#add').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...')


           setTimeout(function(){
            $.ajax({
                url:'ins.php',
                method:'POST',
                data,
                success:function(res){
                    myRes=JSON.parse(res)
                    if(myRes.status==200){
                        location.href="index.php";
                    }else{
                        alert(myRes.msg)
                    }
                }
            })
           },3000)

        })
    })
</script>
    
</body>

</html>