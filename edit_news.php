<!DOCTYPE html>
	<html>
		<head>
			<title>delete current news:</title>
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



            <h1>Edit current news:</h1>
            <h4>This helps to check that you are not a robot, or some stupid hackers. </h4>
            
            <?php

                    
                    printf("<br>");
                    echo htmlentities("The news is:");


                    $news_id = (integer) trim($_GET['news_id']);
                    $news_user_id = (integer)trim($_GET['news_user_id']);
                    
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
                    
                    printf("\t<br><strong>%s</strong> <br> %s\n",
                            htmlspecialchars($news_topic),
                            htmlspecialchars($news_content)
                        );

                        ?>

			<form action="edit_news_1.php" method="POST">
            <input type="text" name="contents" id="contents" id = "myTextArea" rows = "6"
                  cols = "80" style="height:200px;width:420px;" maxlength="150"/>
				<input type="hidden" name="news_user_id" value="<?php echo $_GET['news_user_id']?>" />
				<input type="hidden" name="news_id" value="<?php echo $_GET['news_id']?>" />
				<input type="hidden" name="token" value="<?php session_start(); echo $_SESSION['token'];?>" />
				<input type="submit" value="Submit">
			</form>
		</body>
	</html>