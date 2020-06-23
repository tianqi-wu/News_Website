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
        Andy's news sharing site Ver.0.0.1--Comments!
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
    printf("Hello, %s",htmlentities($username));
}

//This part is for enumerating the database.
//I would not do this until I finish the login page.

printf("<br><p><strong>The following are the comments presented with the news</strong></p>");

printf("<br>");

echo htmlentities("<p>The news is:</p>");


$news_id = $_GET['news_id'];
$news_user_id = $_GET['news_user_id'];

require 'database.php';

$stmt1 = $mysqli->prepare("select news_topic, news_content from news where news_id = ?");
if(!$stmt1){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt1->bind_param('i', $news_id);

$stmt1->bind_result($news_topic, $news_content);

$stmt1->execute();
//Not sure whether this would be OK
$stmt1->fetch();

printf("\t<br><strong><h3>%s    </h3></strong> <br> <h3><p>%s</p></h3>\n",
		htmlspecialchars($news_topic),
		htmlspecialchars($news_content)
    );

    $stmt1->close();

    //mysql_free_result();
    
    require 'database.php';

    $news_id = $_GET['news_id'];

$stmt = $mysqli->prepare("select comment_id, user_id, comment_content from comment where news_id = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('i', $news_id);

$stmt->bind_result($comment_id, $user_id, $comment_content);

$stmt->execute();

printf("<br><p><strong>The following are the comments presented with the news</p></strong>");

printf("<br>");

echo "<a href='add_comment.php?news_user_id=$news_user_id&news_id=$news_id'><input type='button'value='add new comments'></a>";


while($stmt->fetch()){
    echo "<br>";
	printf("\t%s\n",
		htmlspecialchars($comment_content)
    );
    printf("<br> comment by %s<br/>",htmlspecialchars($username));

    echo "<a href='edit_comment.php?news_user_id=$news_user_id&comment_id=$comment_id'><input type='button'value='edit this comment'></a>";
    echo "<a href='delete_comment.php?news_user_id=$news_user_id&comment_id=$comment_id'><input type='button'value='delete this comment'></a>";
}

$stmt1->close();

?>





<br>
            <br/>
</body>

</html>

