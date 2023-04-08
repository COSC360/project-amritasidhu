<!DOCTYPE html>
<html lang="en">
<head>

    <script src="../JS/login.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-12"  id="MainHeader">
                <a href="../HTML/index.php"><img src="../images/logo.png" alt="logo" id="logo"></a>
                <a href="../HTML/profile.php"><img src="../images/profile.png" alt="profile" id="profileLink"></a>
                Bloogle! 
            </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-sm-12"  id="body">
            <div>
                <form class="">
                    <input class = "backButton" type="backButton" value="<- Go Back" onclick="history.back()">
                </form>
            </div>



            <!-- Username getting extracted from DB -->

            
            <div class="userName"> 
            <?php 
            
                session_start();
              echo "<h1 class ='name'>" .$_SESSION["username"]. "</h1>";
                ?>   
              
            </div>

            <div class="info">
                 <a href="../HTML/editUsername.html">
                 <button class="button">Edit Username</button>
                 </a>
                 <br>
                 <a href="../HTML/changePassword.html">
                 <button class="button">Change Password</button>
                 </a>
                 <br>
                 <a href="../HTML/termsOfUse.html">
                 <button class="button">Terms of Use</button>
                 </a>
                 <br>
                 <a href="../HTML/deleteAccount.html">
                 <button class="button">Delete Account</button>
                 </a>
                 <br>
                 <a href="../HTML/login.html">
                 <button class="logOutBtn">Sign Out</button>
                 </a>
            </div>   
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
