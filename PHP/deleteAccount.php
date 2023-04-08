<html>


<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pswOld = $_POST['pswOld'];
}

session_start();
$username = $_SESSION["username"];
$user_password = $_SESSION["password"];
$userId = $_SESSION["id"];


    $host = "cosc360.ok.ubc.ca";
    $user = "85822294";
    $password = "85822294";
    $database = "db_85822294";


$connection = mysqli_connect($host, $user, $password, $database);


$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
  
}
else
{
    if($pswOld == $user_password){

    
    //good connection, so do you thing
    $sql = "DELETE FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");

    $sql2 = "DELETE FROM posts WHERE userID = '$userID'";
    $result2 = mysqli_query($connection, $sql2) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
 
    header("Location: https://cosc360.ok.ubc.ca/amrita29/project-amritasidhu/HTML/register.html");
    
       
    }

    
    mysqli_close($connection);
}
?>
</html>
