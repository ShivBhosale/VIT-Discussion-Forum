<?php
session_start();

include('dbconn.php');

$topic=addslashes($_POST['topic']);
$content=nl2br(addslashes($_POST['content']));
$cid=$_GET['cid'];
$scid=$_GET['scid'];

$insert = mysqli_query($con, "INSERT INTO topics (`category_id`, `subcategor_id`, `author`, `title`, `content`, `date_posted`) VALUES ('".$cid."', '".$scid."', '".$_SESSION['Name']."', '".$topic."', '".$content."', NOW());");


if($insert)
{
	header("Location: /FORUM/topics.php?cid=".$cid."&scid=".$scid."");
}
?>