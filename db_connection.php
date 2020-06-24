<?php
    //tạo một class connect database
    class ConnectionDataBase{
        //ket noi database
        public $connection;
        
        function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "managecustomer";
            $this->connection = new mysqli($servername, $username, $password,$database) or die("Connection failed: %s\n". $this->connection->error);
        }

        //ngat ket noi database
        function Close(){
            $this->connection->close();
        }

        //ham truy van 
        function queryforData($array){
            
            $sql = "SELECT * FROM customer WHERE phone LIKE '%$array%'";
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

        //ham install database
        function insertforData($array){

            $sql = "INSERT INTO customer(name, birthday, gender,city,address,email,phone) VALUES (N'$array[0]', '$array[1]', N'$array[2]',N'$array[3]',N'$array[4]', N'$array[5]', '$array[6]');";
            if($this->connection->query($sql))
            {
                return true;
            }
            else
            {
                echo "<br>Error: " . $sql . "<br>" . $this->connection->error;
                return false;
            }
        }

        //function update database
        function updateforData($array){

            $sql = "UPDATE phongban SET TenPhong = N'$array[0]' WHERE MaPhong = '$array[1]'";
            if($this->connection->query($sql))
            {
                echo "<h3> Record updated successfully </h3>";
            }
            else
            {
                echo "<br>Error updating record: " . $sql . "<br>" . $this->connection->error;
            }
        }

        //function delete database
        function deleteforData($array)
        {
            $sql = "DELETE FROM phongban WHERE MaPhong = '$array[0]'";
            if($this->connection->query($sql))
            {
                echo "<h3>Record deleted successfully</h3>";
            } 
            else 
            {
              echo "Error deleting record: " . $this->connection->error;
            }        
        }

    }
?>
