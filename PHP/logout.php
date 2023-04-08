<?php
if(isset($_POST['submit'])) {
 session_destroy();
 header("Location: http://localhost:8082/project-amritasidhu/HTML/login.html");
}
?>