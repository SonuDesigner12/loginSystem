<?php
session_start();
include('db.php');

    $select_query = "SELECT * FROM `admin`";
    $query_run = mysqli_query($conn, $select_query);
    $getData = mysqli_fetch_assoc($query_run);
    $rows = mysqli_fetch_assoc($query_run)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing: border-size;
        }
        .title {
            text-align: center;
            font-size: 5rem;
            text-transform: capitalize;
            font-weight: 100;
            margin: 0;
            padding: 0;
            width: 100%;
            background: aquamarine;
            color: blue;
        }
        table {
            width: 100%;
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="title">welcome <?php echo $_SESSION['username']; ?></h2>
    <button type="button" class="btn" href="logout.php">Logout</button>

    <div class="container">
        <div class="row">
        <table class="table" border="1">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
            <?php
                            echo '<tr>';
                            echo '<td>' . $rows['id'] . '</td>'; // Assuming 'id' is the column name for ID
                            echo '<td>' . $rows['name'] . '</td>';
                            echo '<td>' . $rows['email'] . '</td>';
                            echo '<td>' . $rows['password'] . '</td>';
                            echo '</tr>';
                    ?>
                
            </tbody>
        </table>
        </div>
    </div>

    
</body>
</html>