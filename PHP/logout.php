<?php
if(isset($_POST['submit'])) {
 session_destroy();
 header("Location: https://cosc360.ok.ubc.ca/amrita29/project-amritasidhu/HTML/login.html");
}
?>