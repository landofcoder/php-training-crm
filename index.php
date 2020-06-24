<?php
/**
 * CRM project
 * @author developer
 * @homepage https://github.com/
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY WebSite</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom.min.css" type="text/css">
</head>
<body>
    <!-- create header -->
    <div class="jumbotron text-center">
        <h3>MANAGE CUSTOMER</h3>
        <P>Phạm Quang Huy - HaNoi National University of Education</P>
    </div>

    <!-- form đăng ký -->
    <from>
        <div class="container">
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nName">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Huy Pham Quang">
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nPhone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" placeholder="0165 154 xxx">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">Email</label>
                    <input type="email" class="form-control" name="mail" placeholder="nguyen123@gmail.com" >
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Birth Day</label>                            
                    <input type="date" class="form-control" name="birthday" placeholder="18">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3" id="box1">
                    <label for="nEmail">City</label>
                    <input type="email" class="form-control" name="city" placeholder="Ha Noi" >
                </div>
                <div class="form-group col-sm-3" id="box2">
                    <label for="nAge">Address</label>                            
                    <input type="text" class="form-control" name="address" placeholder="Cau Giay">
                </div>
            </div>
        </div>


        <div class="outer">
            <label for="nGioiTinh" id="box3">Gender:  </label>  
            <label><input type="radio" id="box3" name="nGioiTinh">Male</label>
            <label><input type="radio" id="box3" name="nGioiTinh">Female</label>
        </div>
        <div class="outer">
            <div id="box3">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <div id="box3">
                <button type="submit" style="border:none; padding:0px"><a href="login.php" class="btn btn-primary">Page Admin</a></button>
            </div>
       </div>
    </from>
</body>
</html>