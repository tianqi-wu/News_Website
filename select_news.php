<!DOCTYPE HTML>
<html lang = 'en'>
<head  style = "text-align : CENTER">
    <title> Andy's news coverage site</title>
    <link rel="stylesheet" href="csstemp.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src = https://code.jquery.com/jquery-3.4.1.js></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel ="icon" href = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png">


</head>
<body style = "text-align : CENTER">
    <h1>
        Andy's news sharing site Ver.0.0.1
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
      </ul>
</div>
</nav>

<?php
/*Ordinary checking session.*/
session_start();
if(!isset($_SESSION['username'])){
echo "<p><strong>You are not logged in.</strong></p>";
echo "<a href='login.php'><input type='button'value='Login'></a>";
echo "<br><p><strong> New user? </strong></p>";
echo "<a href='register.php'><input type='button'value='Register'></a>";
}else{
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    printf("Hello, %s",htmlentities($username));
    echo "<a href='logout.php'><input type='button'value='Logout'></a>";
    echo "<a href='add_news.php?user_id=$user_id'><input type='button'value='add some news'></a>";
    echo "<a href='main.php'><input type='button'value='Go back to the main page'></a>";
}

$news_user_id = $_SESSION['user_id'];
//This part is for enumerating the database.
//I would not do this until I finish the login page.

printf("<br><strong>The following are your news:</strong>");

require 'database.php';

$stmt = $mysqli->prepare("select news_id, news_user_id, news_topic, news_content from news where news_user_id = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('i', $news_user_id);

$stmt->execute();

$stmt->bind_result($news_id, $news_user_id, $news_topic, $news_content);

while($stmt->fetch()){
	printf("\t<br><strong>%s</strong> <br> %s\n",
		htmlspecialchars($news_topic),
		htmlspecialchars($news_content)
    );
    printf("<br> news by %s<br/>",htmlspecialchars($username));
    echo "<a href='news_comment.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='see the comments'></a>";
    echo "<a href='edit_news.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='edit this news'></a>";
    echo "<a href='delete_news.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='delete this news'></a>";
}



?>





<br>
            <img src = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png" alt = "F6F-5N">
            <br/>
</body>

</html>

