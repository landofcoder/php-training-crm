<?php

session_start();
include("db_connection.php");
$connection = new connectionDatabase();
if ($connection->connection->connect_error)
    echo "lỗi kết nối";

if (isset($_REQUEST['add'])) {
    $arr = array(
        "name" => addslashes($_POST['name']),
        "phone" => addslashes($_POST['phone']),
        "email" => addslashes($_POST['email'])
    );
    XssAttachSQL($arr);
    $result = $connection->duplicateDB($arr['phone'], $arr['email']);
    $row = mysqli_fetch_assoc($result);
    // check datatabase duplicate

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
        echo "<script>alert('Registration successful');</script>";
    } else
        echo "<script>alert('E-mail or phone number already in use');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY WebSite</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom.min.css" type="text/css">
    <script type="text/javascript" src="jS/main.js"></script>
</head>

<body>
    <!-- create header -->
    <div class="jumbotron text-center">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>
    <!-- form đăng ký -->

    <form name="myForm" action="index.php" onsubmit="return validateForm()" method="post">
        <div class="container">
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nName">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Huy Pham Quang">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nPhone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="0165 154 xxx">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="mail" placeholder="nguyen123@gmail.com">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Birth Day</label>
                    <input type="date" class="form-control" name="birthday" placeholder="18">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Ha Noi">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Cau Giay">
                </div>
            </div>
        </div>
        <div class="outer">
            <label for="nGioiTinh" id="box3">Gender: </label>
            <label><input type="radio" id="box3" name="gender" value="Nam">Male</label>
            <label><input type="radio" id="box3" name="gender" value="Nữ">Female</label>
        </div>
        <div class="outer">
            <div id="box3">
                <button type="submit" name="add" class="btn btn-primary" value="submit">Sign Up</button>
            </div>
            <div id="box3">
                <button type="submit" name="return" style="border:none; padding:0px"><a href="login.php"
                        class="btn btn-primary">Admin</a></button>
            </div>
        </div>
    </form>
</body>

</html>