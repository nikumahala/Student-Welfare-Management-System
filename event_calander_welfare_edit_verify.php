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
		<title> Edit Form for Event Calander </title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    
    	#ev_w
    	{
    		font-size: 25px;
			font-weight: bold;
			margin: 40px 50px 100px 250px; 
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
                    <li><a href="home_1_admin.php">Home</a></li>
                    <li><a href="event_calander_welfare.php">Edit Event Calander</a></li>
                    <li><a href="event_photos_welfare.php">Edit Event Photos</a></li>
                    

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
<center>
<?php
include_once('connection.php');
if(isset($_POST['e_edit']))
{
$eid = $_POST['eid'];
$query = "select * from event_calander where event_id = '$eid' ";
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

while($row = mysqli_fetch_array($result))
{
	$eid = $row['event_id'];
	$ename = $row['event_name'];
	$etype = $row['event_type'];
	$edate = $row['event_month'];
	$edesc = $row['event_desc'];
	#echo $eid . $ename . $etype . $edate . $edesc;
}
}

if(isset($_POST['eedit']))
{
	function alertmsg($alt_msg)
    {
        echo("<script type='text/javascript'> 
			alert('".$alt_msg."'); </script>");
    }
    
	$eid = $_POST['eid'];
	$ename = $_POST['ename'];
	$etype = $_POST['etype'];
	$edate = $_POST['edate'];
	$edesc = $_POST['edesc'];
	#echo $eid . $ename . $etype . $edate . $edesc;

	$query = "UPDATE event_calander SET event_name='$ename', event_type='$etype', event_month='$edate', event_desc='$edesc' WHERE event_id='$eid'";
	$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

	
	if ($result)
	{	
		$nrows=mysqli_affected_rows($conn);
		if($nrows>0)
		{
			$alt_msg = "Successfully Edited Event!";
      $name = alertmsg($alt_msg);
      echo '<script type="text/javascript">window.location.href = "event_calander_welfare.php"; </script>';
		//header("Location: http://localhost:8080/PHP6/8.html");
			exit;
		}
	}

}
?>

<h1> <strong style="color:#000033;"> Edit Event Here! </strong> </h1>
<div id="ev_w">
	<form method="post" action='event_calander_welfare_edit_verify.php'>
	Event Name: <input type='text' name='ename' value="<?php echo $ename; ?>" readonly required><br><br>
	Event Type: <select name='etype' value="<?php echo $etype; ?>" required>
				<option value='Technical'> Technical </option>
				<option value='Non-Technical'> Non-Technical </option>
				<option value='Cultural'> Cultural </option> 
				<option value='Social'> Social </option>
			</select> <br><br>
	Event Month: <input type='date' name='edate' value="<?php echo $edate; ?>" required><br><br>
	Event Description: <input type='textarea' name='edesc' value="<?php echo $edesc; ?>"><br><br>
	<input type='hidden' value='<?php echo $eid;?>' name='eid'>
	<center> <input type='submit' value='Edit' name='eedit'> </center>
	</form>
</div>
</center>
</body>
</html>