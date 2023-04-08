<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/post.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../JS/post.js"></script>
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

    <div class="container">
        <div class="row">
            <div class="col-sm-2" id="toolBar">
                <div class="container" id = "searchBar">
<!-- <<<<<<< Updated upstream
                    <p id="searchTitle">Search</p> 
                    <br>
                    <img src="../images/search.png" alt="logo" id="searchIcon">
                    <form name="search" action="../PHP/searchedUser.php" method="post" novalidate>
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
======= -->
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
                

            
               
            </div>

            <!-- Post with comments thread: -->

            <div class="col-sm-8" id="main">
            <h3 id = "yourPosts"></h3>  

            <div id = "post">

            <?php
            $host = "cosc360.ok.ubc.ca";
            $user = "85822294";
            $password = "85822294";
            $database = "db_85822294";

         
         
             $connection = mysqli_connect($host, $user, $password, $database);
         

             $userID = 1;


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
                        <h5> By: '. $username .' </h5>
                        <p class = "date">'. $title .'</p>
                        <p>'. $body .'</p>';
            }
             }

            ?>

            <!-- Likes and Dislikes: -->

            <!-- and show incremental count -->
             <!-- if user likes post: -->
             <!-- step 1)check if user has liked post from db: -->

             <?php

            $host = "cosc360.ok.ubc.ca";
            $user = "85822294";
            $password = "85822294";
            $database = "db_85822294";
             
         
         
             $connection = mysqli_connect($host, $user, $password, $database);
         
             $userID = 1;
             $error = mysqli_connect_error();
             if($error != null)
             {
               $output = "<p>Unable to connect to database!</p>";
               exit($output);
         
         
             }else{
            $postID = $_GET['postID'];

                // $likesCount - mysqli_fetch_assoc(mysqli_query)

                // function userLiked($postID){
                //     $sql = "SELECT * FROM `rating` WHERE user_id = $userID AND post_id = $postID AND rating_action = 'like'";
                //     $result = mysqli_query($connection, $sql);

                //     if(mysqli_num_rows($result) > 0){
                //         return true;
                //     }
                //     else{
                //         return false;
                //     }
                // }

                // //to get total number of likes:
                // function getLikes($postID){
                //     $sql = "SELECT COUNT(*) FROM `rating` WHERE post_id = $postID AND rating_action = 'like'";
                //     $result = mysqli_query($connection, $sql);

                //     $rs = mysqli_fetch_array($result);

                //     return $rs[0];
                // }

             }
             ?>


            <button name="like" class = "like-btn" action ="" method ="post"> Like ( count ) </button>
            <button name="dislike" class = "dislike-btn" action ="" method ="post"> Dislike ( count ) </button>
            

            <script type="text/javascript">

                $(document).ready(function(){
                    var like = 0;

                    //User like button interaction:

                    $('.like-btn').on('click', function(){
                        var post_id = $(this).data('id');
                        $clicked_btn = $(this);

                        // we can change button color depending on if its clicked.
                    })
                    $.ajax({
                        url: 'post.php',
                        type: 'post',
                        data: {
                            'action': action,
                            'post_id': post_id
                        }
                    })

                })


            </script>


            <!-- comments: -->
            <h3>Add a comment: </h3>
            <?php

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
        
        
            }else{
            // $method = ($_SERVER['REQUEST_METHOD']);
            if(isset($_POST['submit'])){
                //insert comment into db
                $commentName = $_POST['cName'];
                $commentTitle = $_POST['cTitle'];
                $comment = $_POST['comment'];
                $postID = $_GET['postID'];

                $sql = "INSERT INTO comments (post_id, comment_user, comment_title, comment) VALUES ('$postID', '$commentName', '$commentTitle','$comment')";
                $result = mysqli_query($connection, $sql);
            };
            }

            ?>
            <form  action ="" method ="post">
                <label for="cName">Name:</label><br>
                <input type = "text" id='cName' title='cName' name='cName'> </input><br>
                <label for="cTitle">Title:</label><br>
                <input type = "text" id='cTitle' title='cTitle' name='cTitle'> </input><br>
                <label for="comment">Add your comment:</label>
                <input type = "text" id='comment' title='comment' name='comment'> </input><br>
                <input type='submit' value="submit" name="submit" >
            </form>

            <h3>Comments: </h3>
            <?php 

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
             else { 
                $postID = $_GET['postID'];
                $sql = "SELECT * FROM comments WHERE post_id = $postID";
                $result = mysqli_query($connection, $sql);
                $noresult = true;

                while($row = mysqli_fetch_assoc($result)){
                    $commentName = $row['comment_user'];
                    $commentTitle = $row['comment_title'];
                    $comment = $row['comment'];

                    echo '<p> User: '. $commentName .' <br>Title: '. $commentName .' <br>Comment:'. $comment .'</p>';
                }
             }

             




            ?>

            
            <p id= "comment"> comments end  </p>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>