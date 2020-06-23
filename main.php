<!DOCTYPE HTML>
<html lang = 'en'>
<head  style = "text-align : CENTER">
    <title> Andy's news coverage site</title>
    <link rel="stylesheet" href="csstemp.css" />
    <link rel ="icon" href = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src = https://code.jquery.com/jquery-3.4.1.js></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   

</head>
<body style = "text-align : CENTER">
    <h1>
        
        </h1>

        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Andy's news sharing site Ver.1.0.0</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php">Home</a></li>
      <li><a href="#">Personal Profile Page(Under Construction)</a></li>
      <li><a href="#">Other Services</a></li>

<?php
/*Ordinary checking session.*/
session_start();
if(!isset($_SESSION['username'])){
echo "<li style=''><a href='login.php'>Login</a></li>";
echo "<li><a href='register.php'>Register</a></li>";
echo "</div></div></li>    
</ul>
</div>
</nav>";
}else{
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    echo "<li><a href='logout.php'>Logout</a></li>";
    echo "
    </ul>
    </div>
    </nav>
    <div style ='border-radius: 12px' class='h jumbotron' >";
    printf("Hello, %s. Your UID is %s",htmlentities($username),htmlentities($user_id));

    echo "<a href='add_news.php?user_id=$user_id'><input type='button'value='add some news'></a>";
    echo "<a href='select_news.php?user_id=$user_id'><input type='button'value='see your own news'></a>";
}

//This part is for enumerating the database.
//I would not do this until I finish the login page.
echo "<div class=col-lg-12 col-md-12 col-sm-12'>";
echo "<div style ='border-radius: 12px' class='h jumbotron' >";
printf("<br><strong>The following are the news present</strong>");

require 'database.php';

$stmt = $mysqli->prepare("select news_id, news_user_id, news_topic, news_content from news");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($news_id, $news_user_id, $news_topic, $news_content);

while($stmt->fetch()){
	printf("\t<br><strong>%s</strong> <h5> %s</h5>\n",
		htmlspecialchars($news_topic),
		htmlspecialchars($news_content)
    );
    printf("<br><p> news by UID %s</p><br/>",htmlspecialchars($news_user_id));
    echo "<a href='news_comment.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='see the comments'></a>";
    echo "<a href='edit_news.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='edit this news'></a>";
    echo "<a href='delete_news.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='delete this news'></a>";
}

echo "</div></div>";

?>





<br/>

            <br/>


</body>

</html>

