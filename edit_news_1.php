<!DOCTYPE html>
<html>
    <head style = "text-align : CENTER">
       <title>News-sharing Site Ver 0.0.1: action!</title> 
       <link rel="stylesheet" href="csstemp.css" />




       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src = https://code.jquery.com/jquery-3.4.1.js></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </head>

    <body style = "text-align : CENTER">
<!-- PHP starts here-->

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
    /* As it is definitely registered, we don't have to do the same thing. */
    session_start();
    if(!hash_equals($_SESSION['token'], $_POST['token'])){
        die("Request forgery detected");
    }
    $news_user_id = $_POST['news_user_id'];
    $user_id = $_SESSION['user_id'];
    if((!isset($_SESSION['username']))||($user_id!=$news_user_id)){
    echo "<p><strong>You are not logged in, or you are not allowed to edit this.</strong></p>";
    echo "<br><a href='login.php'><input type='button'value='Login'></a>";
    }else{
$username = $_SESSION['username'];
$news_user_id = (integer)$_POST['news_user_id'];
$user_id = $_SESSION['user_id'];
$news_id = (integer)$_POST['news_id'];
$contents = (string)$_POST['contents'];

require 'database.php';

$stmt = $mysqli->prepare("UPDATE news SET news_content=? WHERE news_id=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('si', $contents,$news_id);

$stmt->execute();

$stmt->close();

printf("<p><strong>News edited!</strong></p>" );


/*Need corresponding sections.*/

/* Step One: validating input. 
* Because of the Session Section, we are 100% sure that it would be passed throughout every layer.
*/

//Start



//End
    }
    
?>
<!--PHP ends here-->

<form name = "input" action = "main.php">
				<input type="submit" value="Back to the Front Page"/>
    </form>

<!--<img src = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png" alt = "F6F-5N">-->
    </body>


</html>