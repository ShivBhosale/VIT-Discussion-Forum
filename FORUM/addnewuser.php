<?php
include ('dbconn.php');

$newuser=$_POST['usernameinput'];
$newpwd=$_POST['passwordinput'];
// $temp = preg_replace("/\s+/","",$newuser);
// $temp2 = " ";//preg_replace("/\s+/","",$newpwd);

if($newuser!='' || $newpwd!='' )
{

$insert = mysqli_query($con, "INSERT INTO userid (`Name`, `Password`) VALUES ('".$newuser."', '".$newpwd."');");


if($insert){

	header("Location: /FORUM/index.php?status=reg_success");

}

}
else
{
	echo "Username And Password Required!";
	// if($temp2!='')
	// {
	 // echo preg_replace("/\s+/","",$temp2);
	 // echo "here";
	// }
}

?>
