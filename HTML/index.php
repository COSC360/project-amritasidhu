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
                <a href="../HTML/index.html"><img src="../images/logo.png" alt="logo" id="logo"></a>
                <a href="../HTML/profile.php"><img src="../images/profile.png" alt="profile" id="profileLink"></a>
                Bloogle! 
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
                    <form name="searchUser" action="../PHP/searchedUserFunction.php" " method="post" novalidate>
                    <input type="text" id="searchInput" placeholder="Search" name="search"/>
                    <input type="submit" value="Submit" name="submit" class="logInbtn"></input>
                </form>
                </div>
                <br>
                <div class="container" id = "searchBar">
                    <p id="searchTitle">Search for Topic</p> 
                    <br>
                    <img src="../images/search.png" alt="logo" id="searchIcon">
                    <form name="searchTopic" action="../HTML/searchedTopic.php" " method="post" novalidate>
                    <input type="text" id="searchInput" placeholder="Search" name="search"/>
                    <input type="submit" value="Submit" name="submit" class="logInbtn"></input>
                </form>
                </div>
                <br>
                <div class="container" id="bookmarks"></div>
                <a href="../HTML/bookmarks.html">
                <img src="../images/bookmark.png" alt="bookmark" id="bookmarksIcon">
                <p id="bookmarksTitle">bookmarks</p> 
                </a>
                <br>
                <div class="container" id="following"></div>
                <a href="../HTML/following.html">
                <img src="../images/following.png" alt="following" id="followingIcon">
                <p id="followingTitle">Following</p> 
                </a>
                <br>
                <div class="container" id="trending"></div>
                <a href="../HTML/trending.html">
                <img src="../images/trending.png" alt="trending" id="trendingIcon">
                <p id="trendingTitle">Trending</p> 
                </a>
                <br>
                <div class="container" id="trending"></div>
                <a href="../HTML/newPost.html">
                <p id="trendingTitle">New Post</p> 
                </a>
            
               
            </div> 

            <div class="col-sm-8" id="main">
                <h3 id = "yourPosts">Your Posts</h3>



                
                  
              <?php 
              error_reporting(E_ALL);

              ini_set('display_errors', '1');

                 

                
             $host = "localhost"; 
             $database = "project"; 
             $user = "webuser"; 
             $password = "P@ssw0rd";
             
             
             $connection = mysqli_connect($host, $user, $password, $database);

             session_start();
             $userId = $_SESSION["id"];
             
             
             $error = mysqli_connect_error();
             if($error != null)
             {
               $output = "<p>Unable to connect to database!</p>";
               exit($output);
             
               
             }else{
                 
                 //good connection, so do you thing
                 $sql = "SELECT title, body, date FROM posts WHERE userID = '$userId'";
         
                 
             
                 $results = mysqli_query($connection, $sql);
             
                 //and fetch requsults
                 
             
                 
             }
                    
           

             while ($row = mysqli_fetch_assoc($results)) {
                     
                echo "<div id = 'post'>";
                echo"<h4>".$row['title'] ."</h4>";
                  echo "<p>" .$row['body'] . "</p>";
                   echo "<p class ='date'>" .$row['date']. "</p>";
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