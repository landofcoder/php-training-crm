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
    <!-- get database -->
    <?php
        include ("db_connection.php");
        $servername = "localhost";
        $username = "root";
        $password = ""; //NULL
        $database = "managecustomer";
        $connection = new ConnectionDataBase($servername, $username, $password, $database);
    ?>
    <!-- create header -->
    <div class="jumbotron text-center" style=" margin-bottom: 0px; padding-bottom: 20px; padding-top: 20px;">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>
    <form class="text-center border border-light p-5" action="#!">
        <p class="h4 mb-4">SELECT THE FUNCTION</p>
        <button type="submit" style="border:none; padding:0px"><a href="addnew.php" class="btn btn-primary">Add New</a></button>
        <button type="submit" style="border:none; padding:0px"><a href="editdb.php" class="btn btn-primary">Edit</a></button>
        <button type="submit" style="border:none; padding:0px"><a href="" class="btn btn-primary">Delete</a></button>
        <button type="submit" style="border:none; padding:0px"><a href="querydb.php" class="btn btn-primary">Query</a></button>
    </form>
</body>
</html>
