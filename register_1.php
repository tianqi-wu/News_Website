<!DOCTYPE HTML>
<html lang = 'en'>
<head>
    <link rel="stylesheet" href="csstemp.css" />
    <title>Registeration page</title>
    <link rel="stylesheet" href="csstemp.css" />
    <title>Registration page</title>
    <link rel = "icon" href="https://upload.kcwiki.org/commons/2/27/Soubi255HD.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src = https://code.jquery.com/jquery-3.4.1.js></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel ="icon" href = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png">

</head>
<body>

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
/* This thing supports the login page.
By any means, it should check whether it's valid.

*/
//Unfinished here
/*Has to check whether it's in the table
 * Then give the correct operations here.
 * If in the table, turn to the next page;
 * If not in the table, ask for signing-up.
 */

$name = $_POST['username'];
$pass = $_POST['password'];
//sanity check
if( !preg_match('/^[\w_\.\-]+$/', $name) ){
	echo "<h5>Invalid name!</h5>";
	exit;
}

if( !preg_match('/^[\w_\.\-]+$/', $pass) ){
	echo "<h5>Invalid name!</h5>";
	exit;
}


//connecting to mySQL && checking:

if(isset($_POST['username'])&&isset($_POST['password'])){
require 'database.php';

$username = (string) trim($_POST['username']);
$password = (string) trim($_POST['password']);
$confirm = (string) trim($_POST['confirm']);

if(!hash_equals($password, $confirm)){
    printf("<h3><strong>Password does not match the confirmation!</strong></h3>");
    echo("<br>");
    echo "<a href='register.html'><input type='button' class='button btn-info' value='Go back to registration'></a>";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);
//Not sure whether this would work. 
$stmt = $mysqli->prepare("insert into users (user_name, user_password) values (?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
//From stackoverflow. https://stackoverflow.com/questions/9599163/how-to-prevent-duplicate-usernames-in-php-mysql
/*
$dup = mysql_query("SELECT username FROM users WHERE username='".$_POST['username']."'");
if(mysql_num_rows($dup) >0){
    echo '<b>username Already Used.</b>';
    exit;
}
*/
//From stackoverflow.
$stmt->bind_param('ss', $username, $hashed_password);

$stmt->execute();

$stmt->close();

echo "<p>Registration successful!</p>";

}//I don't think any else cases should exist here.s
?>


<form name = "input" action = "main.php">
				<input type="submit" value="Back to the Front Page"/>
    </form>
    

    </body>
</html>
