<?php
//tạo một class connect database
class ConnectionDataBase
{
    //ket noi database
    public $connection;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "managecustomer";
        $this->connection = new mysqli($servername, $username, $password, $database) or die("Connection failed: %s\n" . $this->connection->error);
    }

    //ngat ket noi databasa
    function Close()
    {
        $this->connection->close();
    }

    //ham truy van 
    function queryforData($array)
    {
        foreach ($array as $x => $x_value) {
            $sql = "SELECT * FROM customer WHERE $x LIKE '%$x_value%'";
        }
        $result = $this->connection->query($sql);
        return $result;
    }
    function queryallforData()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->connection->query($sql);
        return $result;
    }
    //ham truy van theo id
    function selectforData($array)
    {
        $sql = "SELECT * FROM customer WHERE id = '$array'";
        $result = $this->connection->query($sql);
        return $result;
    }

    // dang nhap
    function loginDB($username, $password)
    {
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $this->connection->query($sql);
        return $result;
    }

    //function install database
    function insertforData($array)
    {
        $sql = "INSERT INTO customer(name, birthday, gender,city,address,email,phone) 
        VALUES 
        (N'" . $array['name'] . "', '" . $array['birthday'] . "', N'" . $array['gender'] . "',N'" . $array['city'] . "',N'" . $array['address'] . "', N'" . $array['email'] . "', '" . $array['phone'] . "');";
        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    //function check trùng database
    function duplicateDB($phone, $email)
    {
        $sql = "SELECT * FROM customer WHERE phone = '$phone' OR email ='$email'";
        $result = $this->connection->query($sql);
        return $result;
    }

    //function check trùng database
    function duplicateDBPhone($phone)
    {
        $sql = "SELECT * FROM customer WHERE phone = '$phone'";
        $result = $this->connection->query($sql);
        return $result;
    }

    function duplicateDBEmail($email)
    {
        $sql = "SELECT * FROM customer WHERE email ='$email'";
        $result = $this->connection->query($sql);
        return $result;
    }

    //function update database
    function updateforData($arr2, $id)
    {
        $sql = "UPDATE customer SET ";

        foreach ($arr2 as $x => $x_value) {
            $sql = $sql . $x . " ='" . $x_value . "',";
        }
        $sql = substr($sql, 0, -1);
        $sql = $sql . " WHERE  id = '" . $id . "';";
        $connection = new mysqli('localhost', 'root', '', 'managecustomer') or die("Connection failed: %s\n" . $connection->error);
        $result = $connection->query($sql);
        return $result;
    }
    //function delete database
    function deleteforData($id)
    {
        $sql = "DELETE FROM customer WHERE id = '$id'";
        $result = $this->connection->query($sql);
        return $result;
    }
}

//function remove special char
function removeSpecialChar(&$array)
{
    foreach ($array as $x => $x_value) {
        if (!$array['email'])
            $array['$x'] = preg_replace('/\PL/u', ' ', $array['$x']);
    }
}

function XssAttachSQL(&$arr)
{
    $arr['name'] =  htmlspecialchars($arr['name'], ENT_QUOTES, 'UTF-8');
    $arr['email'] =  htmlspecialchars($arr['email'], ENT_QUOTES, 'UTF-8');
    $arr['phone'] =  htmlspecialchars($arr['phone'], ENT_QUOTES, 'UTF-8');
}

function XssAttachSQLID(&$arr)
{
    $arr =  htmlspecialchars($arr, ENT_QUOTES, 'UTF-8');
}

$connection = new connectionDatabase();
//create function delete database
if (isset($_GET['del'])) {
    $id  = addslashes($_GET['del']);
    $connection->deleteforData($id);
    header("Location:querydb.php");
    exit;
}