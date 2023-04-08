<html>


<?php




error_reporting(E_ALL);

ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $psw = $_POST['psw']; 
    $pswCheck = $_POST['pswCheck'];
    $pswOld = $_POST['pswOld'];
}

session_start();
$username = $_SESSION["username"];
$user_password = $_SESSION["password"];


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
    if($psw == $pswCheck && $pswOld == $user_password){

    $user_password_hashed =  md5($psw);
    //good connection, so do you thing
    $sql = "UPDATE users SET password = '$user_password_hashed' WHERE username = '$username' ";



    $result = mysqli_query($connection, $sql) or die("<p color=\"#f00\">Could not fetch assoc array in database.</p>");
  
 
    header("Location: http://localhost:8082/project-amritasidhu/HTML/profile.html");
    
       
    }

    
    mysqli_close($connection);
}
?>
</html>
