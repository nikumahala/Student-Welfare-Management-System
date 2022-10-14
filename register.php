<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    echo $_SESSION['username'];
}
?>

<!doctype html>
<html>
<head>
	<title> Registration Form </title>
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
                    <li><a href="home_1.php">Home</a></li>
                    
                    

                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="register.php">Sign Up<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                    <li><a href="loggin.php">Login<i class="fa fa-user" aria-hidden="true"></i></a></li>
                    
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

<?php
$showAlert = false;
$showError=$showError_1=$showError_2=$showError_3 = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    function alertmsg($alt_msg)
    {
        echo("<script type='text/javascript'> 
            alert('".$alt_msg."'); </script>");
    }

  include_once('connection.php');
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $utype = $_POST['utype'];
  //$exists = false;
  // Check whether the username exist 
  $existSql = "SELECT * FROM signup where username = '$username'";
  //  $existSql = "Select * from users where username='$username'";
  $result = mysqli_query($conn, $existSql) or die( mysqli_error($conn));
 
  $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0) {
    $showError = "Username already exists";
  }
  else{
    
    if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
      $showError_1 = "Email is not valid";
    }

    else if(strlen($password) < 8){
      $showError_2 = "Password is short (should be between 8 to 23 characters)"; 
    }

    else if($password == $cpassword)
    {
    $sql = "INSERT INTO signup (name, utype, username, password, dt) VALUES ('$name', '$utype', '$username', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $nrows=mysqli_affected_rows($conn);
        if($nrows>0)
        {
            $alt_msg = "Successfully Registered!";
            $name = alertmsg($alt_msg);
            echo '<script type="text/javascript"> window.location.href = "home_1.php" </script>';
        //header("Location: http://localhost:8080/PHP6/8.html");
            exit;
        }
    }
    }
    else{
      $showError_3 = "Passwords do not match";
    }  
  }
}
?>



<br> <br>
<center> <h1> <strong style="color:#000033;">Signup to our website </strong> </h1> </center>
<div id="ev_w">
      <form action="register.php" method="post">
          Name: <input type="text" name="name" required>  <br><br>
          User Type: <select name='utype' required><br><br>
                      <option value='Student'> Student </option>
                      <option value='Faculty'> Faculty </option>
                      <option value='Admin'> Admin </option>
                      </select><br><br>
          Username (Email) : <input type="text" name="username" required> <span style="color: red;"><?php echo $showError; ?> <?php echo $showError_1; ?> </span> <br><br>
        Password:  <input type="password" name="password" required> <span style="color: red;"><?php echo $showError_2; ?> </span>  <br><br>
        
        Confirm Password:  <input type="password" name="cpassword" required> <span style="color: red;"><?php echo $showError_3; ?> </span> 
          <div id="emailHelp" class="form-text">Make sure to type the same password.</div><br><br>
        
        <input type="submit" value="signup">
      </form>
    </div>
</body>
</html>
