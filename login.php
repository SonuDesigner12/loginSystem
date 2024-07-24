<?php
    session_start();
    include('db.php');

    if(isset($_POST['submit'])) {
        echo " login btn click";

        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $email;
        echo $password;
         // check email and password match or not
        $select_query = "SELECT * FROM `admin` 
            WHERE `email` = '$email' AND `password` = '$password'";
        $select_query_run = mysqli_query($conn, $select_query);

        $getData = mysqli_fetch_assoc($select_query_run);

        if($getData > 0) {
            $_SESSION['username'] = $getData['name'];
            header('location: dashboard.php');

        }else {
            echo "kuch error aaya";
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
    </style>
</head>

<body>

    <div class="container form-container">
        <h2 class="text-center">Login</h2>
        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
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

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--ajax script file-->
    <script src="apps.js"></script>
</body>

</html>