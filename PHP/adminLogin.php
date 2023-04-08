<?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $admin_email = $_POST['email']; 
        $admin_password = $_POST['password'] ;
    }

    if (isset($_POST['login'])){
        setcookie("email", $admin_email,time() + 60*60*24*365);
        
    }


    $host = "localhost";
    $user = "85822294";
    $password = "85822294";
    $database = "db_85822294";
    
    
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
    


<<<<<<< Updated upstream
    if ($conn->query($sql) === TRUE) {
      echo "User Registered!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
=======
        //good connection, so do you thing
        $sql = "SELECT password, username, id FROM admin WHERE username = '$username'";
    
    
    
        $results = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
      
        $rowcount=mysqli_num_rows($results);
    
    
        if($rowcount == 0){
                 
          echo("<h1> Username/Password does not exist");
          echo("<h4> Please try again </h4>");
          echo("<a href='http://localhost:8082/project-amritasidhu/HTML/adminLogIn.html'>Try Again</a>");
        }
    
        while ($row = mysqli_fetch_assoc($results))
            {
            $check = $row['password'];
    
    
    
            if($check == $admin_password_hashed){
              session_start();
              $_SESSION["username"]=$username;
              $_SESSION["id"] = $row['id'];
              $_SESSION["password"] = $admin_password;
    
              header("Location: http://localhost:8082/project-amritasidhu/HTML/admin.php");
            }else{
              
              echo("<h1> Username/Password does not exist");
              echo("<h4> Please try again </h4>");
              echo("<a href='http://localhost:8082/project-amritasidhu/HTML/adminLogIn.html'>Try Again</a>");
       
          
            }
    
           
        }
    
        mysqli_free_result($results);
        mysqli_close($connection);
>>>>>>> Stashed changes
    }
    
    $conn->close();
  
?>
