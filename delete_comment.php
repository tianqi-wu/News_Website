<!DOCTYPE html>
	<html>
		<head>
			<title>delete current comment:</title>
            <link rel="stylesheet" href="csstemp.css" />


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
            <h1>Delete current comment:</h1>
            <h4>This helps to check that you are not a robot, or some stupid hackers. </h4>

			<form action="delete_comment_1.php" method="POST">
				<input type="hidden" name="news_user_id" value="<?php echo $_GET['news_user_id']?>" />
				<input type="hidden" name="comment_id" value="<?php echo $_GET['comment_id']?>" />
				<input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
				<input type="submit" value="Submit">
			</form>
		</body>
	</html>