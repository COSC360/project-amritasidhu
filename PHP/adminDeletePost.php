<html>


<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $PostTitle = $_POST['title'];
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
    
   
    $sql = "DELETE FROM posts WHERE title = '$PostTitle'";
    $result = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
 
    header("Location: http://localhost:8082/project-amritasidhu/HTML/searchedTopicAdmin.php");
    
       
    

    
    mysqli_close($connection);
}
?>
</html>
