<?php


error_reporting(E_ALL);

ini_set('display_errors', '1');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username']; 
        $admin_password = $_POST['psw'] ;
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
      
    }
    else
    {
        $admin_password_hashed =  md5($admin_password);
       

        //good connection, so do you thing
        $sql = "SELECT password, username, id FROM admin WHERE username = '$username'";
    
    
    
        $results = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
      
        $rowcount=mysqli_num_rows($results);
    
    
        if($rowcount == 0){
                 
          echo("<h1> Username/Password does not exist");
          echo("<h4> Please try again </h4>");
          echo("<a href='http://localhost:8082/project-amritasidhu/HTML/login.html'>Try Again</a>");
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
              echo("<a href='http://localhost:8082/project-amritasidhu/HTML/login.html'>Try Again</a>");
       
          
            }
    
           
        }
    
        mysqli_free_result($results);
        mysqli_close($connection);
    }
    ?>
    </html>