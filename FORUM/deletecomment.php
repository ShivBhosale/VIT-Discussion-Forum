<?php
include('dbconn.php');
include('layout_manager.php');
include('content_function.php');


if(isset($_POST['action']))
{
	echo "its set!";
	echo "<script>alert ();</script>";
	$type=$_GET['type'];
	$rid=(int)$_GET['rid'];
	//$cid=$_GET['cid'];
	//$scid=$_GET['scid'];
	switch($type)
	{
		case 'delete':
		$select = mysqli_query($con, "DELETE FROM replies WHERE ($rid=reply_id)");
										 if($select)
										 {
											 echo "upvote success";
										 }
									//echo "here2"; works...testing

		break;
	}

	//header("Location: topics.php?cid=".$cid."&scid=".$scid."");
}

//echo "fail"; worksss <3
?>
