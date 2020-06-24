
<?php
        include ("db_connection.php");
        $connection = new connectionDatabase();
        if($connection->connection->connect_error)
            echo "lỗi";
        if(isset($_REQUEST['search']))
        {
            $array = addslashes($_POST['phone']);
            $result= $connection->queryforData($array);
        }
        else{
            $result= $connection->queryforData("0");
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
    <div class="jumbotron text-center" style=" margin-bottom: 0px; padding-bottom: 20px; padding-top: 20px;">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>

    <div class="container">
        <br />
        <form action="querydb.php" method="post">
            <div align="left" style="margin-bottom:5px;">
                <button type="submit" name="search" id="query_button" class="btn btn-primary">Search</button>  &emsp;
                <input type="text" name="phone" placeholder="Phone Number" >
            </div>    
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birth Day</th>
                    <th scope="col">Gender</th>
                    <th scope="col">City</th>
                    <th scope="col">Adderss</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row=mysqli_fetch_assoc($result))
                    {
                        echo '<tr>';
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['birthday']}</td>";
                            echo "<td>{$row['gender']}</td>";
                            echo "<td>{$row['city']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['phone']}</td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <form class="text-center border border-light p-5" action="#!">
        <button type="submit" style="border:none; padding:0px"><a href="select.php" class="btn btn-primary">Return</a></button>
    </form>
</body>
</html>






