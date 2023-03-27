<?php



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searched_username = $_POST['search']; 
        
    }

    
        setcookie("searched_user", "", time() - 3600);
        setcookie("searched_user", $searched_username,time() + 60*60*24);
        $_COOKIE["searched_user"];
        
    


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
        header("Location: https:"cosc360.ok.ubc.ca/gwilchuk/home.html");
        exit();
    }
    


    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();