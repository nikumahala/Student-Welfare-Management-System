<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    echo "<h3>". $_SESSION['username'] . " - " . $_SESSION['utype'] . "</h3>";
}
?>

<?php
include_once('connection.php');
function alertmsg($alt_msg)
    {
        echo("<script type='text/javascript'> 
            alert('".$alt_msg."'); </script>");
    }
	
	$e_name = $e_sdate = $e_edate= $e_subname= "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$target = "C:/xampp/htdocs/Practicals/LAMP Project/Event_Rules/".basename($_FILES['filename']['name']);
    	$pdf = $_FILES['filename']['name'];
		$e_name = test_input($_POST["e_name"]);
		$e_sdate = test_input($_POST["e_sdate"]);
		$e_edate = test_input($_POST["e_edate"]);
		$e_subname = test_input($_POST["e_subname"]);

		$query = "INSERT INTO on_going_event(on_name, on_sdate, on_edate, on_subname, on_pdf) VALUES('$e_name', '$e_sdate','$e_edate','$e_subname', 
		'$pdf')";
    	$result = mysqli_query($conn, $query);
    	move_uploaded_file($_FILES['filename']['tmp_name'], $target);

    	if($result)
		{
			$alt_msg = "Event Added Successfully!";
        	$name = alertmsg($alt_msg);
        	echo '<script type="text/javascript">window.location.href = "home_1_faculty.php"; </script>';
		}
		
	}

	function test_input($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add on going event</title>
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

        input[type=text], input[type=date], input[type=password],select
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

        input[type=text], input[type=date], input[type=password], select, textarea:focus 
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
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}
        * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}</style>
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
                    <li><a href="home_1_faculty.php">Home</a></li>
                    <li><a href="add_ongoing_event.php">Add On Going Event</a></li>
                    <li><a href="list_volunteers.php">Volunteers' List</a></li>
                    <li><a href="list_registration.php">Registrations' List</a></li>

                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                    
                    
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
    
<center> <h1> <strong style="color:#000033;"> Add On Going Event Here! </strong></h1> </center><br><br>


<div id="ev_w">
<form method="post" action= "add_ongoing_event.php" enctype="multipart/form-data">  
  Event Name: <input type="text" name="e_name" required>
  <br><br>
  Event Start Date: <input type="date" name="e_sdate" required>
  <br><br>
  Event End Date: <input type="date" name="e_edate" required>
  <br><br>
  Sub Event Names: <input type="text" name="e_subname" required>
  <br>
  "Please write event names with ,"<br><br>
  Upload Rules: 
  <input type="file" id="myFile" name="filename" required><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>

</body>
</html>
