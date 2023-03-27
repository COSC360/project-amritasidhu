<?php



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searched_username = $_POST['search']; 
        
    }

    
        setcookie("searched_user", "", time() - 3600);
        setcookie("searched_user", $searched_username,time() + 60*60*24);
        header("Location: https:"localhost:8082/project-amritasidhu/HTML/searchedUser.html");
        
    

?>