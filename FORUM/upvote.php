<?php
include('dbconn.php');
include('layout_manager.php');
	include('content_function.php');
	include('validatelogin.php');
echo "success123";

if(isset($_POST['action']))
{
	//echo "its set!";
echo "<script>alert ();</script>";
	$type=$_GET['type'];
	$rid=(int)$_GET['rid'];
	$cid=$_GET['cid'];
	$scid=$_GET['scid'];
	$name=$_SESSION['Name'];
	switch($type)
	{
		case 'votes':
		$select = mysqli_query($con, "UPDATE replies SET votes=votes+1 WHERE reply_id={$rid}");
										 if($select)
										 {
											 echo "upvote success";
										 }

										 //echo "success till here";

		$log = mysqli_query($con, "INSERT INTO upvotelog (authorm, reply_idm, flag) VALUES ('".$_SESSION['Name']."', '".$rid."', '1')");
		                                if($log)
										{
											echo "success";
										}

									//echo "here2"; works...testing

		break;
	}

	//header("Location: topics.php?cid=".$cid."&scid=".$scid."");
}

//echo "fail"; worksss <3
?>
