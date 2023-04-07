<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/post.css">
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
                <a href="../HTML/profile.html"><img src="../images/profile.png" alt="profile" id="profileLink"></a>
                Bloogle! 
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-2" id="toolBar">
                <div class="container" id = "searchBar">
                    <p id="searchTitle">Search</p> 
                    <br>
                    <img src="../images/search.png" alt="logo" id="searchIcon">
                    <form name="search" action="../PHP/searchedUser.php" " method="post" novalidate>
                    <input type="text" id="searchInput" placeholder="Search" name="search"/>
                    <input type="submit" value="Submit" name="search" class="logInbtn"></input>
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
            
               
            </div>

            <!-- Post with comments thread: -->

            <div class="col-sm-8" id="main">
            <h3 id = "yourPosts"></h3>  

            <div id = "post">

            <?php
             $host = "localhost";
             $user = "85822294";
             $password = "85822294";
             $database = "db_85822294";
             
         
         
             $connection = mysqli_connect($host, $user, $password, $database);
         
         
             $error = mysqli_connect_error();
             if($error != null)
             {
               $output = "<p>Unable to connect to database!</p>";
               exit($output);
         
         
             }else{
            $postID = $_GET['postID'];
            $sql = "SELECT * FROM posts WHERE id=$postID";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)){
            
            $username = $row['username'];
            $title = $row['title'];
            $body = $row['body'];
            $date = $row['dateCreated'];

                echo '
                        <h4>'. $title .'</h4>
                        <h3> By: '. $username .' </h3>
                        <p class = "date">'. $title .'</p>
                        <p>'. $body .'</p>';
            }
             }

            ?>

            <!-- comments: -->

            <div id = "comments">
            <h4>Comments: </h4>



            <h5 id= "commentName"> Amrita  </h5>
            <p id= "comment"> comment number 1  </p>
            
            </div>

            <?php
            $host = "localhost";
            $user = "85822294";
            $password = "85822294";
            $database = "db_85822294";
            
        
        
            $connection = mysqli_connect($host, $user, $password, $database);
        
        
            $error = mysqli_connect_error();
            if($error != null)
            {
              $output = "<p>Unable to connect to database!</p>";
              exit($output);
        
        
            }else{
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == $_POST){
                //insert comment into db
                $commentName = $_POST['cName'];
                $commentTitle = $_POST['cTitle'];
                $comment = $_POST['comment'];
                $postID = $_GET['postID'];

                $sql = "INSERT INTO comments (post_id, comment_user, comment_title, comment) VALUES ('$postID', '$commentName', '$commentTitle','$comment')";
                $result = mysqli_query($connection, $sql);
            }
            }

            ?>
            

            </div>
            <form class="form" action = "<?php $_SERVER['REQUEST_URI']?>" method ="post">
                <label>Posted By:  </label>
                <br>
                <input type = "text" id='cName' title='cName' name='cName'> </input>
                <br>
                <input type = "text" id='cTitle' title='cTitle' name='cTitle'> </input>
                <br>
                <textArea type = "text" id='comment' title='comment' name='comment'> </textArea>
                <br>
                <button type='submit'> Submit </button>

            </form>
            

            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>