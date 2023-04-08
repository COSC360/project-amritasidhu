<html>


<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; 
    
}
session_start();
$userId = $_SESSION["id"];


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
   
    //good connection, so do you thing
    $sql = "UPDATE users SET username = '$username' WHERE id = '$userId'";



    $results = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
  
   


    

    $_SESSION["username"] = $username;
        
       
        

     header("Location: http://localhost:8082/project-amritasidhu/HTML/index.php");
        

       
    

    mysqli_free_result($results);
    mysqli_close($connection);
    }
?>
</html>
