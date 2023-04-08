<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/indexStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-12"  id="MainHeader">
                <a href="../HTML/admin.php"><img src="../images/logo.png" alt="logo" id="logo"></a>
                <a href="../HTML/adminProfile.html"><img src="../images/profile.png" alt="profile" id="profileLink"></a>
                Bloogle! Admin Portal
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-2" id="toolBar">
                <div class="container" id = "searchBar">
                    <p id="searchTitle">Search for User</p> 
                    <br>
                    <img src="../images/search.png" alt="logo" id="searchIcon">
                    <form name="searchUser" action="../PHP/searchedUserFunctionAdmin.php" " method="post" novalidate>
                    <input type="text" id="searchInput" placeholder="Search" name="search"/>
                    <input type="submit" value="Submit" name="submit" class="logInbtn"></input>
                </form>
                </div>
                <br>
                <div class="container" id = "searchBar">
                    <p id="searchTitle">Search for Topic</p> 
                    <br>
                    <img src="../images/search.png" alt="logo" id="searchIcon">
                    <form name="searchTopic" action="../HTML/searchedTopicAdmin.php" " method="post" novalidate>
                    <input type="text" id="searchInput" placeholder="Search" name="search"/>
                    <input type="submit" value="Submit" name="submit" class="logInbtn"></input>
                </form>
                </div>
                <br>
                <div class="container" id="bookmarks"></div>
                <a href="../HTML/adminInfo.html">
                <p id="bookmarksTitle">User Accounts</p> 
                </a>
                <br>
                <div class="container" id="following"></div>
                <a href="../HTML/adminInfo.html">
                <p id="followingTitle">Posts</p> 
                </a>
                <br>
                <div class="container" id="trending"></div>
                <a href="../HTML/adminInfo.html">

                <p id="trendingTitle">Settings</p> 
                </a>
            
               
            </div>
            <div class="col-sm-8" id="main">
                <h3 id ='yourPosts'> Site Statisitcs! </h3>
               
                <?php 
                error_reporting(E_ALL);
                ini_set('display_errors', '1');
    
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
               }else{
                   $sql = "SELECT COUNT(id) as totalUsers from users";
                   $results = mysqli_query($connection, $sql);  
               }
               while ($row = mysqli_fetch_assoc($results)) {
                    echo "<br>";
                    echo "<br>";
                  echo "<div id = 'post'>";
                  echo"<h4> There is currently ".$row['totalUsers'] ." total users.</h4>";
                      
               }        
                          mysqli_free_result($results);
                          mysqli_close($connection);
                  
                  ?> 
                   <?php 
                error_reporting(E_ALL);
                ini_set('display_errors', '1');
    
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
               }else{
                   $sql = "SELECT COUNT(userID) as totalPosts from posts";
                   $results = mysqli_query($connection, $sql);  
               }
               while ($row = mysqli_fetch_assoc($results)) {
                   
                    echo "<br>";
                  echo"<h4> There is ".$row['totalPosts'] ." posts across all users.</h4>";
                    echo "</div>";   
               }        
                          mysqli_free_result($results);
                          mysqli_close($connection);
                  
                  ?> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>