<?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_username = $_GET['username']; 
        $user_password = $_GET['password'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_username = $_POST['username']; 
        $user_password = $_POST['password'] ;
    }

    if (isset($_POST['login'])){
        setcookie("username", $user_username,time() + 60*60*24*365);
        setcookie("password", $user_password,time() + 60*60*24*365);
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
    WHERE username = $user_username;

    if($sql == $user_password){
        header("Location: https:"localhost:8082/project-amritasidhu/HTML/index.html");
        exit();
    }
    


    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
?>