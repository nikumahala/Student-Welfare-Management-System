<?php

include_once('connection.php');

  if (isset($_POST['v_re'])) 
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
    $post = test_input($_POST["post"]);
    $experience = test_input($_POST["experience"]);

    $query = "INSERT INTO event_volunteers(v_ename, v_sname, v_rname, v_email, v_post, v_exp) VALUES('$e_name', '$name', '$r_name', '$email', '$post', '$experience')";
    $result = mysqli_query($conn, $query);

    if($result)
    {
      $alt_msg = "Successfully Registered for Volunteers!";
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