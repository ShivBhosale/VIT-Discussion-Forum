<?php
    include('layout_manager.php');
	include('content_function.php');
	addviews($_GET['cid'], $_GET['scid'], $_GET['tid']);
?>

<html>
<head><title> VIT FORUM </title></head>
<link href="/FORUM/styles/main.css" type="text/css" rel="stylesheet" />
<body>
<div class="pane">
<div class="header"><h1> <a href="/FORUM"> WELCOME TO VIT FORUM!</a></h1></div>
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
 <p>Share your knowledge and some cliched dialogues</p>
 
 <?php
     if(!isset($_SESSION['Name']))
	 {
		 echo "<p>you must login/register first: <a href='/FORUM/registration.html'>Register</a></p>";
	 }
 
 
 ?>
 </div>
 
 <?php
 
 if(isset($_SESSION['Name']))
 {
	 replytopost($_GET['cid'], $_GET['scid'], $_GET['tid']);
 }
 
 
 ?>
 
 <div class="content">
    <?php disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']); ?>
 
 </div>
 
 
</div>
</body>
</html>