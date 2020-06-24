
<?php
        include ("db_connection.php");
        $connection = new connectionDatabase();
        if($connection->connection->connect_error)
            echo "lỗi";
        if(isset($_REQUEST['logindb']))
        {
            $u = $_POST['user'];
            $p = $_POST['pass'];
            $result= $connection->loginDB($u,$p);
            $row=mysqli_fetch_assoc($result);

            if($row != NULL)
            {
                header("Location:select.php");
            }
            else
            {
                ?>
                <!DOCTYPE html>
                <body>
                    <script>
                        alert("The account or password is incorrect");
                    </script>
                </body>
                </html>
                <?php
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY WebSite</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom.min.css" type="text/css" media="all">
</head>
<body>
    <!-- create header -->
    <div class="jumbotron text-center">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>
    <!-- Default form login -->
    <form class="text-center border border-light p-5" action="login.php" method="post">
        <p class="h4 mb-4">Sign in</p>
        <div >
            <input type="text" placeholder="User Name" name="user" class= "custominput"><br>
        </div>
        <input type="password" placeholder="Password" name="pass" class= "custominput"><br>
        <!-- Sign in button -->
        <button type="submit" name="logindb" class="btn btn-primary">Sign in</a></button>
    </form>

</body>
</html>
