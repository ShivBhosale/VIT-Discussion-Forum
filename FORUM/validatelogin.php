<?php
session_start();
include('dbconn.php');
$username =$_POST['usernameinput'];
$password =$_POST['passwordinput'];

$result = mysqli_query($con, "SELECT Name, Password FROM userid WHERE Name='".$username."' AND Password='".$password."'");
if(mysqli_num_rows($result)!=0 && !empty($username) && !empty($password))
{
	$_SESSION['Name']=$username;
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
else
{
	header("Location: http://localhost/FORUM/?status=login_fail");

	//header("Location: ".$_SERVER['HTTP_REFERER']."?status=login_fail");
	//echo "Zhol!";
}
?>
