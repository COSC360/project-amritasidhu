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

            <div class="col-sm-8" id="main">

            <h2 id = "yourPosts"> Add Post: <h2> <br> <br>

            <div id="post">

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
            // $method = ($_SERVER['REQUEST_METHOD']);
            if(isset($_POST['submit'])){
                //insert comment into db
                session_start();
                $pName = $_SESSION["username"];
                $postTitle = $_POST['pTitle'];
                $post = $_POST['post'];
                // $postID = $_GET['postID'];

                $sql = "INSERT INTO posts(username, body, title) VALUES ('$pName','$post','$postTitle')";
                $result = mysqli_query($connection, $sql);
            };
            }

            ?>
            <form  action ="../PHP/newPost.php" method ="post">
                <label for="pTitle"> Post Title:</label><br>
                <input type = "text" id='pTitle' title='pTitle' name='pTitle'> </input><br>
                <label for="post">Add Post:</label>
                <br>
                <br>
                <textarea name='postbody' id="bodyEntry"  rows="10"> </textarea>
                <br>
                <input type='submit' value="submit" name="submit" >
            </form>
            </div>

            <br>



            <h3 id = "yourPosts">Your Posts</h3>  
            <?php
             
             $host = "localhost";
             $user = "85822294";
             $password = "85822294";
             $database = "db_85822294";
            session_start();
            $uid = $_SESSION["id"];
         
             $connection = mysqli_connect($host, $user, $password, $database);
         
         
             $error = mysqli_connect_error();
             if($error != null)
             {
               $output = "<p>Unable to connect to database!</p>";
               exit($output);
         
         
             }else{
               
            $sql = "SELECT * FROM posts WHERE userID = '$uid'";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)){
            
            $id = $row['userID'];
            $username = $row['username'];
            $title = $row['title'];
            $body = $row['body'];
            $date = $row['dateCreated'];
                echo "<div id='posts'>";
                echo '
                <a href="../PHP/post.php">
                    <div id = "post"">
                        <a href="../PHP/post.php?postID='. $id .'">
                        <h4>'. $title .'</h4> 
                        </a>
                        <p>'. substr($body,0, 200) .'...</p>
                            <p class = "date">'. $username .'</p>
                             <p class = "date">'. $date .'</p>
                        <button><a href="../PHP/post.php?postID='. $id .'"> View Post </a></button>
                    </div>';
             echo "</div>";
            }
             }

            ?>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>