<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searched_username = $_POST['search']; 
        
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
    
        //good connection, so do you thing
        $sql = "SELECT id, username FROM users WHERE username = '$searched_username'";

        echo $sql;
    
        $results = mysqli_query($connection, $sql);
    
        //and fetch requsults
        while ($row = mysqli_fetch_assoc($results))
        {
            session_start();
            $_SESSION["searchedUserId"] = $row["id"];
            $_SESSION["searched_username"] = $row["username"];
    
        }
 
        mysqli_free_result($results);
        mysqli_close($connection);
    }



    
    

       header("Location: http://localhost:8082/project-amritasidhu/HTML/searchedUser.php");
    

?>