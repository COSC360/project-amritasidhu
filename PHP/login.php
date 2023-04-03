<?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_username = $_GET['username']; 
        $user_password = $_GET['psw'] ;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_username = $_POST['username']; 
        $user_password = $_POST['psw'] ;
    }

    if (isset($_POST['login'])){
        setcookie("username", $user_username,time() + 60*60*24*365);
        setcookie("password", $user_password,time() + 60*60*24*365);
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
      $sql = "SELECT password, username FROM users WHERE username = '$user_username'";
    $results = mysqli_query($connection, $sql);


    $hashCheck = md5($user_password);

    if ($results->num_rows > 0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($results)){
        $check = $row['password'];
       
        
        if($row["password"] == $hashCheck){
       header("Location: http://localhost:8082/project-amritasidhu/HTML/index.html");
        
        }
      }
    }
    
  }

    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
?>