<?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $username = $_GET['username']; 
        $email = $_GET['email'];
        $password = $_GET['password'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username']; 
        $email = $_POST['email'];
        $password = $_POST['password'] ;
    }

   

    echo 'username: ' . $username;
    echo ' email  ' . $email . "\n";

 

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
    VALUES ($username, $email, $password)";
    
    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
   
    





?>