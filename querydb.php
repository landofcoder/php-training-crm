<?php
include("db_connection.php");
$connection = new connectionDatabase();
if ($connection->connection->connect_error)
    echo "lỗi";
$result = $connection->queryallforData();
// ---------------------- connection Database-----------------------

// ----------------- request search ---------------
if (isset($_REQUEST['search'])) {
    $arr = array("phone" => addslashes($_POST['phone']));
    $result = $connection->queryforData($arr);
    $result2 = $connection->queryforData($arr);
    $row2 = mysqli_fetch_assoc($result2);
    if ($row2 == NULL) {
        echo "<script>alert('NULL')</script>";
    }
} else {
    $result = $connection->queryallforData();
}


if (isset($_REQUEST['add'])) {
    $arr = array(
        "name" => addslashes($_POST['name']),
        "phone" => addslashes($_POST['phone']),
        "email" => addslashes($_POST['email'])
    );
    XssAttachSQL($arr);
    $result = $connection->duplicateDB($arr['phone'], $arr['email']);
    $row = mysqli_fetch_assoc($result);
    if ((empty($row))) {
        $arr = array(
            "name" => addslashes($_POST['name']),
            "birthday" => addslashes($_POST['birthday']),
            "gender" => addslashes($_POST['gender']),
            "city" => addslashes($_POST['city']),
            "address" => addslashes($_POST['address']),
            "email" => addslashes($_POST['email']),
            "phone" => addslashes($_POST['phone'])
        );

        XssAttachSQL($arr);
        removeSpecialChar($arr);

        $result = $connection->insertforData($arr);
        $result = $connection->queryallforData();
    } else {
        echo "<script>alert('E-mail or phone number already in use');</script>";
        $result = $connection->queryallforData();
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

    <script type="text/javascript">
    function testConfirmDialog() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
    </script>

</head>

<body>
    <!-- create header -->
    <div class="jumbotron text-center" style=" margin-bottom: 0px; padding-bottom: 20px; padding-top: 20px;">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>

    <div class=" container">
        <br />
        <form action="querydb.php" method="post">
            <div align="left" style="margin-bottom:5px;">
                <button type="submit" name="search" id="query_button" class="btn btn-primary">Search</button> &emsp;
                <input type="text" name="phone" placeholder="Phone Number">
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
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['birthday']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>" ?> <a href="editdb.php?edit=<?php echo $row['id']; ?>"
                    class="btn btn-primary">Edit</a><?php echo "</td><td>" ?>
                <a href="db_connection.php?del=<?php echo $row['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to Remove?');">Delete</a>
                <?php
                    echo "</td></tr>";
                }
                ?> </tbody>
        </table>
    </div>
    <form class="text-center border border-light p-5" action="#!">
        <button type="submit" style="border:none; padding:0px"><a href="addnew.php" class="btn btn-primary">Add
                New</a></button>
    </form>
</body>

</html>