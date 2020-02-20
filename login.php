<!DOCTYPE HTML>
<html lang = 'en'>
<head>
    <link rel="stylesheet" href="csstemp.css" />
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src = https://code.jquery.com/jquery-3.4.1.js></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   

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
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <p>
            <label for="username">Enter your Name:</label>
            <input type="text" class = "form-control" name="username" id="username" />
            <label for="password">Enter your password:</label>
            <input type="password" class = "form-control" name="password" id="password" />
        </p>
        <p>
            <input type="submit" class= 'button btn-success' value="Send" />
            <input type="reset" class='button btn-danger' value = 'reset'/>
        </p>
    </form>

    <form name = "input" action = "main.php">
				<input type="submit" value="Back to the Front Page" class='button btn-info'/>
    </form>


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
	echo "Please enter something reasonable above.";
	exit;
}

if( !preg_match('/^[\w_\.\-]+$/', $pass) ){
	echo "Please enter something reasonable above.";
	exit;
}

//connecting to mySQL && checking:

if(isset($_POST['username'])&&isset($_POST['password'])){
    $username = (string) trim($_POST['username']);
    $password = (string) trim($_POST['password']);


require 'database.php';

$stmt = $mysqli->prepare("select user_id, user_password FROM users WHERE user_name=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('s', $username);

$stmt->execute();

$stmt->bind_result($user_id, $pwd_hash);

$stmt->fetch();

$pwd_guess = (string) trim($_POST['password']);
// Compare the submitted password to the actual password hash

if(password_verify($pwd_guess, $pwd_hash)){
    // Login succeeded!
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['token'] = bin2hex(random_bytes(32));

    // Redirect to your target page
    header("Location: main.php");
} else{
    // Login failed; redirect back to the login screen
    echo "<p>Login failed!</p>";
}
//Not sure whether we have to keep this
//$stmt->close();

}//I don't think any else cases should exist here.s
?>

<img src = "https://upload.kcwiki.org/commons/2/27/Soubi255HD.png" alt = "F6F-5N">
</body>
</html>