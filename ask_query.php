<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    $u = $_SESSION['username'];
    echo "<h3>". $_SESSION['username'] . " - " . $_SESSION['utype'] . "</h3>";
}
?>

<html>
<body>
<head>
<title> Ask Question </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    	#ev_w
    	{
    		font-size: 25px;
			font-weight: bold;
			margin: 40px 50px 100px 450px; 
			padding: 20px;
    	}

    	input[type=text], input[type=date], select
    	{
    		width: 50%;
  			padding: 12px 20px;
  			margin: 8px 0;
  			box-sizing: border-box;
  			border: 3px solid #ccc;
  			-webkit-transition: 0.5s;
  			transition: 0.5s;
  			outline: none;
    	}
    	input[type=textarea] 
		{
  			width: 50%;
  			height: 150px;
  			padding: 12px 20px;
 		 	box-sizing: border-box;
  			border: 3px solid #ccc;
  			font-size: 16px;
  			resize: none;
		}

    	input[type=text], input[type=date], select, textarea:focus 
    	{
  			border: 3px solid #000033;
		}
		
		input[type=submit]
		{
		background-color: #000033;
  		border: none;
  		width: 250px;
  		color: white;
  		padding: 20px 32px;
  		text-align: center;
  		text-decoration: none;
  		display: inline-block;
  		font-size: 20px;
  		margin: 10px 2px;
  		cursor: pointer;
  		-webkit-transition-duration: 0.4s; /* Safari */
  		transition-duration: 0.4s;
		}
	input[type=submit]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
		
    	</style>
	</head>
<body style="background-color:#ccccff">

        <style>
        .bgImage {
            background-image: url(background.jpg);
            background-size: cover;
            background-position: center center;
            height: 500px;
            margin-bottom: 25px;
        }
        .jumbotron {
            background: none
        }
        .navbar, .navbar-default{
            background-color: #000033 ;
            font-size: 2rem;
            text-decoration-color: white;
        }
        .jumbotron{
            text-align: center;
        }
        a:hover {
             background-color: white    ;
        }

        </style>
        <header class="bgImage" > 
            <nav class="navbar navbar-dark">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!--<a class="navbar-brand" href="#">Student Welfare</a>-->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="home_1_student.php">Home</a></li>
                    <li><a href="event_calander_student.php">Event Calander</a></li>
                    <li><a href="event_photos_student.php">Event Photos</a></li>
                    <li><a href="query_student.php">Query Forum</a></li>
                    <li><a href="student_ongoing.php">On Going Event</a></li>
                    <li><a href="Dashboard_Student.php">My Dashboard</a></li>
                    

                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                
                    <li><a href="logout.php">Logout<i class="fa fa-user" aria-hidden="true"></i></a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

            <div class = "col-md-12">
                <div class = "container">
                    <div class = "jumbotron"><!--jumbotron-->
                        <br><br><br>
                        <h1 style="color:#000033;"><strong style="color:#000033;">Student<br></strong> Welfare Board</h1><!--jumbotron heading-->
                        
                        <br>    
                        <br><div class="browse d-md-flex col-md-14" >
                        <div class="row">
                          
                    </div>
                </div>
            </div>
        </header> 
</div>
</div>
</header>

<center> <h1><strong style="color:#000033;"> Please Ask Your Question Here! </strong> </h1><br> <br> </center>

<?php
  include_once('connection.php');
?>
<?php
  if (isset($_POST['ask'])) 
  {
    ?>
    <div id="ev_w">
    <form method="post" action="ask_query.php" onsubmit="return func()">
      <textarea rows="4" cols="50" name="query" id="query" autocomplete="off"></textarea>
      <div id="div1"></div><br><br>
      <input type="submit" name="askquery" value="Submit">
    </form>
  </div>
    <script type="text/javascript">
      function func()
      {
        var query = document.getElementById('query').value;
        if(query == "")
              {
                document.getElementById('div1').innerHTML = "** Please fill the query field.";
                document.getElementById('div1').style.color = "Red";
                return false;
              }
      }
    </script>
    <?php
  }
?>

<?php
if (isset($_POST['askquery'])) 
  {

    function alertmsg($alt_msg)
    {
        echo("<script type='text/javascript'> 
      alert('".$alt_msg."'); </script>");
    }

    $query_ask = $_POST["query"];
    $query = "INSERT INTO query_answer(query_id, query_user, query_ask) VALUES ('','$u','$query_ask')";
    $result = mysqli_query($conn, $query);

    if ($result)
  { 
    $nrows=mysqli_affected_rows($conn);
    if($nrows>0)
    {
      $alt_msg = "Query Raised Successfully!";
      $name = alertmsg($alt_msg);
      echo '<script type="text/javascript">window.location.href = "query_student.php"; </script>';
    //header("Location: http://localhost:8080/PHP6/8.html");
      exit;
    }
  }
  }
?>

</body>
</body>
</html>