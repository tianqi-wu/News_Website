<!DOCTYPE HTML>
<html lang = 'en'>
<head>
    <link rel="stylesheet" href="csstemp.css" />
    <title>Registration page</title>
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
<form action="register_1.php" method="POST">
        <p>
            <label for="username">Enter your Name:</label>
            <input type="text" name="username" class= "form-control" id="username" />
            <label for="password">Enter your password:</label>
            <input type="password" name="password" class= "form-control" id="password" />
            <label for="password">Confirm:</label>
            <input type="password" name="confirm" class= "form-control" id="confirm" />
        </p>
        <p>
            <input type="submit"  class =" button btn-success" value="Send" />
            <input type="reset" class=" button  btn-danger" value="Reset"/>
        </p>
    </form>

    <form name = "input" action = "main.php">
				<input type="submit" class=" button btn-info" value="Back to the Front Page"/>
    </form>


    </body>
</html>