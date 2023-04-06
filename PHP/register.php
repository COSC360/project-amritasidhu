<?php


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

 

    $host = "cosc360.ok.ubc.ca"; 
    $database = "db_85822294"; 
    $user = "85822294"; 
    $password = "85822294";
    
    
    $connection = mysqli_connect($host, $user, $password, $database);
    
    
    $error = mysqli_connect_error();
    if($error != null)
    {
      $output = "<p>Unable to connect to database!</p>";
      exit($output);
    
      
    }else{
        $user_password_hash =  md5($userpassword);
        //good connection, so do you thing
        $sql = "INSERT INTO users (username, email, password) VALUES ('$user_username', '$email', '$user_password_hash')";

        echo $sql;
    
        $results = mysqli_query($connection, $sql);
    
        //and fetch requsults
        while ($row = mysqli_fetch_assoc($results))
        {
    
        }
    
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    ?>
