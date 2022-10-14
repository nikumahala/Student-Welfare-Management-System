<?php
include_once('connection.php');
	
	$name = $e_name = $r_name = $email= "";

	if (isset($_POST['submit'])) 
	{
		function alertmsg($alt_msg)
    	{
        	echo("<script type='text/javascript'> 
            alert('".$alt_msg."'); </script>");
    	}

		$name = test_input($_POST["name"]);
		$e_name = test_input($_POST["e_name"]);
		$r_name = test_input($_POST["r_name"]);
		$email = test_input($_POST["email"]);
		$e_subname = $_POST["check_list"];
		$e_subname = implode(",", $e_subname);

		$query = "INSERT INTO event_registration(e_name, s_name, s_roll, s_email, r_subname) VALUES('$e_name','$name','$r_name','$email','$e_subname')";
		$result = mysqli_query($conn, $query);

		if($result)
		{
			$alt_msg = "Successfully Registered in Event!";
        	$name = alertmsg($alt_msg);
        	echo '<script type="text/javascript">window.location.href = "student_ongoing.php"; </script>';
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