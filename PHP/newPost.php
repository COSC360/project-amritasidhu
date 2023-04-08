<?php
session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $title = $_POST['title']; 
        $body = $_POST['body'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title']; 
        $body = $_POST['body'];
       
    }

    echo("<h1> PISS </h1>");

    $host = "localhost"; 
    $database = "project"; 
    $user = "webuser"; 
    $password = "P@ssw0rd";

    $userId = $_SESSION['id'];

    $connection = mysqli_connect($host, $user, $password, $database);
    
    
    $error = mysqli_connect_error();
    if($error != null)
    {
      $output = "<p>Unable to connect to database!</p>";
      exit($output);
    
      
    }else{
        
        //good connection, so do you thing
        $sql = "INSERT INTO posts (title, body, userID) VALUES ('$title', '$body', '$userId')";


        $results = mysqli_query($connection, $sql);
    
        //and fetch requsults
        
        header("Location: http://localhost:8082/project-amritasidhu/HTML/newPost.html");
        
        
    
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    ?>
