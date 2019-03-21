<?php
include './connection.php';
//session_start();
//$_SESSION['user']="";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$query="INSERT INTO `user_details`( `ud_fname`, `ud_lname`, `ud_password`, `ud_email`) VALUES ('$fname','$lname','$password','$email')";
    if(mysqli_query($con, $query))
    {
//        $_SESSION['user']="u_login";
        echo 'you have been registered';
    }
 else {
//        session_destroy();
        echo 'error';        
}
?>
