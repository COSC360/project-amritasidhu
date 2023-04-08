<?php
session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $title = $_POST['pTitle']; 
        $body = $_POST['postbody'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['pTitle']; 
        $body = $_POST['postbody'];
       
    }

   

    $host = "cosc360.ok.ubc.ca";
    $user = "85822294";
    $password = "85822294";
    $database = "db_85822294";

    $userId = $_SESSION['id'];

    $connection = mysqli_connect($host, $user, $password, $database);
    
    
    $error = mysqli_connect_error();
    if($error != null)
    {
      $output = "<p>Unable to connect to database!</p>";
      exit($output);
    
      
    }else{
        
        //good connection, so do you thing
        $sql = "INSERT INTO posts (title, body, id) VALUES ('$title', '$body', '$userId')";


        $results = mysqli_query($connection, $sql);
    
        //and fetch requsults
        
        header("Location: https://cosc360.ok.ubc.ca/amrita29/project-amritasidhu/HTML/index.php");
        
        
    
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    ?>
