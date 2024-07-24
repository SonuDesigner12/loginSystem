<?php
    include('db.php');

    if(isset($_POST['submit'])) {
        // echo "btn click";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // echo $name;
         // check user exist or not
         $select_query = "SELECT * FROM `admin` WHERE email = '$email'";
         $select_query_run = mysqli_query($conn, $select_query);
         $getData = mysqli_num_rows($select_query_run);
         if($getData>0) {
            echo "email exit";
         }else {
            $insert_query = "INSERT INTO `admin`(`id`, `name`, `email`, `password`) VALUES (NULL,'$name','$email','$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);
            if($insert_query_run) {
                echo "data add";
                header('location: login.php');
            }else {
                echo "data not add";
            }

        }
        

        
    }






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        .message {
            margin-top: 100px;
            margin-left: 150px;
            /* border: 2px solid; */
            width: fit-content;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 400;
            text-transform: capitalize;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <div class="container form-container">
        <h2 class="text-center">User Registration</h2>
        <form id="registrationForm" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <small id="name_error" class="form-text text-danger mb-2"></small>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small id="email_error" class="form-text text-danger mb-2"></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                <small id="password_error" class="form-text text-danger mb-2"></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-2" id="submit" name="submit">Register</button>
        </form>
    </div>
    <div class="container">
        <div class="message">
            
        </div>
    </div>








    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--ajax script file-->
    <script src="apps.js"></script>
</body>

</html>