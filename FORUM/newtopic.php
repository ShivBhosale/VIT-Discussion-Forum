<?php
    include('layout_manager.php');
	include('content_function.php');
?>

<html>
<head><title> VIT FORUM </title></head>
<style>
body  {
    background-image: url("http://quotego.biz/wp-content/uploads/2014/07/quotes-about-living-life-tumblr-hd-cute-inspirational-quotes-about-life-hd-quotes-wallpaper-hd-wallpaper.jpg");
    background-color: #cccccc;
	background-size: 100% 100%;
	backgroung-attachment: fixed;
}
</style>

<link href="/FORUM/styles/main.css" type="text/css" rel="stylesheet" />
<link href="/FORUM/styles/acs.css" type="text/css" rel="stylesheet" />
<body>
<div class="pane">
<div class="header"><h1> <a class="special" href="/FORUM"> WELCOME TO VIT FORUM!</a></h1></div>
<div class = "loginpane">
     <?php
	 
	    session_start();
	     if(isset($_SESSION['Name']))
		 {
			 //wasted so mush time on [] thingy
			 logout();
	    
	         
			 
		 }
		 else
		 {
			 if(isset($_GET['status']))
			 {
				 if($_GET['status']=='reg_success')
				 {
					 echo "<h1 style ='color: green;'>Registration successful!</h1>";
				 } 
				 else if($_GET['status']=='login_fail')
				{
					echo "<hi style='color: red;'>User Does Not Exist! </h1> ";
					 
				 }
			 }
			 loginform();
		 }
	 ?>


 </div>
 
 <div class= "forumdesc">
 <p><font color=#ffffff>Share your knowledge and some cliched dialogues</font></p>
 </div>
 
 
 <div class="content">
    <?php 
if(isset($_SESSION['Name']))
{
	echo "<form action='/FORUM/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
	method='POST'>
	<p>Title</p>
	<input type='text' id='topic' name = 'topic' size = '80' />
	<p>Content: </p>
	<textarea cols='80' rows='7' id = 'content' name='content'></textarea><br />
	<br><br>
	<input class='myButton' type = 'submit' value = 'Post' /></form>";
}
else
{
	echo "<p><font color=red>You must login first: </font><a href='/FORUM/register.html>Register</a> </p>";
}







	?>
    
 </div>
</div>
</body>
</html>