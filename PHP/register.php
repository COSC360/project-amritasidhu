<?php
error_reporting(E_ALL);

ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_username = $_GET['username']; 
        $email = $_GET['email'];
        $userpassword = $_GET['psw'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_username = $_POST['username']; 
        $email = $_POST['email'];
        $userpassword = $_POST['psw'];
    }

 

    $host = "localhost"; 
    $database = "project"; 
    $user = "webuser"; 
    $password = "P@ssw0rd";


    $connection = mysqli_connect($host, $user, $password, $database);
    
    
    $error = mysqli_connect_error();
    if($error != null)
    {
      $output = "<p>Unable to connect to database!</p>";
      exit($output);
    
      
    }else{
        $user_password_hash =  md5($userpassword);
        //good connection, so do you thing
        $sql = "INSERT INTO users (username, Email, password) VALUES ('$user_username', '$email', '$user_password_hash')";

        echo $sql;
    
        $results = mysqli_query($connection, $sql);
    
        
        header("Location: http://localhost:8082/project-amritasidhu/HTML/login.html");
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    ?>
