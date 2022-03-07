<?php
class database{
    public $host = "localhost";
    public $username = "root";
    public $password = "Wehave@2vaio";
    public $db = "details";
    public $conn;

    function connection(){
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->db);
        if($this->conn->connect_error){
            die("connection failed:".$this->conn->connect_error);
        }
        echo "connected successful";
    }

    function insertdata($name,$email,$number,$username,$password){
        $this->connection();
        $q="insert into users (name,email,number,username,password) values ('$name','$email','$number','$username','$password')";
        if ($this->conn->query($q) === TRUE) {
            echo "New record created successfully";
            header("location:login.php");
        } else {
            echo "not successful";
        }

    }

    function login($username,$password){
        $this->connection();
        $sql = "select * from users where username ='$username' AND password='$password'";
        $result = $this->conn->query($sql);
        if ($result == 1){
            header("location:index.php");
        }

    }

    function showData(){
        $query="select * from users ";
        $result = $this->conn->query($query);
//        $data = $result->fetch_assoc();
        return $result;
    }



}
