<?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $admin_email = $_POST['email']; 
        $admin_password = $_POST['password'] ;
    }

    if (isset($_POST['login'])){
        setcookie("email", $admin_email,time() + 60*60*24*365);
        
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
    
    $sql = "SELECT FROM admin (password)
    WHERE username = $admin_username;

    if($sql == $admin_password){
        header("Location: https:"localhost:8082/project-amritasidhu/HTML/admin.html");
        exit();
    }
    


    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
?>