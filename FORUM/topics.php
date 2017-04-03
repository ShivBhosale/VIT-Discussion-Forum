<?php
    include('layout_manager.php');
	include('content_function.php');
?>

<html>
<head><title> VIT FORUM </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



</head>
<style>
body  {
    background-image: url("http://quotego.biz/wp-content/uploads/2014/07/quotes-about-living-life-tumblr-hd-cute-inspirational-quotes-about-life-hd-quotes-wallpaper-hd-wallpaper.jpg");
    background-color: #cccccc;
	background-attachment: fixed;
	background-size: 100% 100%;
	
}
</style>
<link href="/FORUM/styles/main.css" type="text/css" rel="stylesheet" />
<link href="/FORUM/styles/acs2.css" type="text/css" rel="stylesheet" />
<body>
<div class="pane">
<div class="header"><h1> <a class="special" href="/FORUM" > WELCOME TO VIT FORUM</a></h1></div>
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
 <p><font color='#ffffff'>Share your knowledge and some cliched dialogues</font></p>
 </div>
 
 <?php
 if(isset($_SESSION['Name'])) //will allowto post only if logged in
 {
	 echo "<br><br>";
	 echo "<div ><p><a class='myButtonlink' href='/FORUM/newtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>
	 add new topic</a></p></div>";
	 
 }
 ?>
 
 
 
 <div class="contentab">
    <?php disptopics($_GET['cid'], $_GET['scid']); ?>
    
 </div>
 

</div>
</body>
</html>