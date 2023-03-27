<?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_username = $_GET['username']; 
        $email = $_GET['email'];
        $user_password = $_GET['password'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_username = $_POST['username']; 
        $email = $_POST['email'];
        $user_password = $_POST['password'] ;
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
    
    $sql = "INSERT INTO users (username, email, password)
    VALUES ($user_username, $email, $user_password)";
    
    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
   
    





?>