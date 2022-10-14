<?php 

session_start();

if(isset($_SESSION['loggedin']))
{
    function alertmsg($alt_msg)
{
        echo("<script type='text/javascript'> 
            alert('".$alt_msg."'); </script>");
}


$alt_msg = "Successfully Logout!";
$name = alertmsg($alt_msg);
echo '<script type="text/javascript">window.location.href = "home_1.php"; </script>';
}

session_unset();

session_destroy();

echo '<script type="text/javascript">window.location.href = "home_1.php"; </script>';
 
exit;

?>