<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    echo "<h3>". $_SESSION['username'] . " - " . $_SESSION['utype'] . "</h3>";
}
?>

<html>
<body>
<head>
<title> All the Queries </title>
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
    table,th,td
  {
    border:3px solid #000033;
    border-collapse: collapse;
    padding: 20px;
    text-align: center;
    font-size: 17px;
    font-weight: bold;
  }
  tr:nth-child(odd) {background-color: #D6EAF8;}
  th
  {
    background-color: #21618C;
    color: white;
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

<center> <h1><strong style="color:#000033;"> See All the Queries Here! </strong> </h1><br> <br> 

<?php
  include_once('connection.php');
?>

<?php
if (isset($_POST['see'])) 
  {
      $query = "SELECT * FROM query_answer";
      $result = mysqli_query($conn, $query);
      ?>

      <table>
      <th>Query</th>
      <th>Asked By </th>
      <th>Answer</th>
      </tr>
        <?php
        // output data of each row
        while($row = mysqli_fetch_array($result)) 
        {
          ?>
            <tr>
            <td> <?php echo $row["query_ask"];?> </td>
            <td> <?php echo $row["query_user"];?> </td>
            <td><form method="post" action="see_query_answer.php">
              <input type="hidden" name="query_id" value="<?php echo $row['query_id']; ?>">
              <input type="hidden" name="query_value" value="<?php echo $row['query_ask']; ?>">
              <input type="submit" name="see_answer" value="see answers">
              </form></td>
            </td>
            </tr>
          <?php
        }
      echo "</table>";
      
  }

?>
</center>
</table>
</body>
</body>
</html>