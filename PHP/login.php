<?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $username = $_GET['username']; 
        $password = $_GET['password'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username']; 
        $password = $_POST['password'] ;
    }


    $servername = "cosc360.ok.ubc.ca";
    $username = "75303370";
    $password = "75303370";
    $dbname = "db_75303370";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT FROM users (password)
    WHERE username = $username;

    if($sql == $password){
        header("Location: https:"cosc360.ok.ubc.ca/gwilchuk/home.html");
        exit();
    }
    


    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
   
    





?>