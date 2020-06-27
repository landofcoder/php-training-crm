<?php
session_start();
include("db_connection.php");
$connection = new connectionDatabase();
if ($connection->connection->connect_error)
    echo "lỗi kết nối";
//SELECT DỮ LIỆU
for ($i = 0; $i < 8; $i++) {
    $array[$i] = '';
}

$check1 = $check2 = '';

if (isset($_GET['edit'])) {
    $id  = addslashes($_GET['edit']);

    $result = $connection->selectforData($id);
    $array = mysqli_fetch_assoc($result);

    //check Gender
    if ($array['gender'] == "Nam") {
        $check1 = 'checked';
        $check2 = ' ';
    }
    if ($array['gender'] == "Nữ") {
        $check1 = ' ';
        $check2 = 'checked';
    }
}

if (isset($_REQUEST['update'])) {

    $arr = array(
        "name" => addslashes($_POST['name']),
        "phone" => addslashes($_POST['phone']),
        "email" => addslashes($_POST['email'])
    );
    XssAttachSQL($arr);
    $result = $connection->duplicateDB($arr['phone'], $arr['email']); // lấy ra mail và phone mới
    $row = mysqli_fetch_assoc($result);

    $id  = addslashes($_POST['id']);

    $resultTEST = $connection->selectforData($id); //select để ra data cũ
    $arrayTEST = mysqli_fetch_assoc($resultTEST);

    $checkmail  = addslashes($_POST['emailcheck']);
    $checkphone = addslashes($_POST['phonecheck']);

    if (empty($row)) {
        $arr2 = array(
            "name" => addslashes($_POST['name']),
            "birthday" => addslashes($_POST['birthday']),
            "gender" => addslashes($_POST['gender']),
            "city" => addslashes($_POST['city']),
            "address" => addslashes($_POST['address']),
            "email" => addslashes($_POST['email']),
            "phone" => addslashes($_POST['phone']),
        );
        $id =  addslashes($_POST['id']);

        XssAttachSQL($arr2);
        removeSpecialChar($arr2);

        $result = $connection->updateforData($arr2, $id);
        header("Location:querydb.php");
    } else {
        if ($row['email'] == $checkmail && $row['phone'] == $checkphone) {
            $arr2 = array(
                "name" => addslashes($_POST['name']),
                "birthday" => addslashes($_POST['birthday']),
                "gender" => addslashes($_POST['gender']),
                "city" => addslashes($_POST['city']),
                "address" => addslashes($_POST['address']),
                "email" => addslashes($_POST['email']),
                "phone" => addslashes($_POST['phone']),
            );
            $id =  addslashes($_POST['id']);

            XssAttachSQL($arr2);
            removeSpecialChar($arr2);

            $result = $connection->updateforData($arr2, $id);
            header("Location:querydb.php");
        } else {
            // echo "<script> alert('E-mail or phone number already in use');
            //         window.location.assign('querydb.php');</script>";
            echo "<script> alert('E-mail or phone number already in use');
                window.location.href='querydb.php'</script>";
        }
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
    <link rel="stylesheet" href="css/custom.min.css" type="text/css">
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
    <!-- create header -->
    <div class="jumbotron text-center">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>
    <!-- form đăng ký -->

    <form name="myForm" action="editdb.php" onsubmit="return validateForm()" method="post">
        <div class="container">
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nName">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $array['name']; ?>">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nPhone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        value="<?php echo $array['phone']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="mail"
                        value="<?php echo $array['email']; ?>">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Birth Day</label>
                    <input type="date" class="form-control" name="birthday" value="<?php echo $array['birthday']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">City</label>
                    <input type="text" class="form-control" name="city" value="<?php echo $array['city']; ?>">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $array['address']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box2">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $array['id']; ?>">
                    <input type="hidden" class="form-control" name="emailcheck" value="<?php echo $array['email']; ?>">
                    <input type="hidden" class="form-control" name="phonecheck" value="<?php echo $array['phone']; ?>">
                </div>
            </div>
        </div>
        <div class="outer">
            <label for="nGioiTinh" id="box3">Gender: </label>
            <label><input type="radio" id="box3" name="gender" value="Nam" <?php echo $check1; ?>>Male</label>
            <label><input type="radio" id="box3" name="gender" value="Nữ" <?php echo $check2; ?>>Female</label>
        </div>
        <div class="outer">
            <div id="box3">
                <button type="submit" name="update" class="btn btn-primary" value="update">Update</button>
            </div>
        </div>
    </form>
</body>

</html>