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
<div class="header"><h1> <a class="special "href="/FORUM/"> WELCOME TO VIT FORUM</a></h1></div>
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
					//header("Location: ".$_SERVER['HTTP_REFERER']."");
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
 

    <div class="accordion">
        <ul>

                        
               <?php dispcategories(); ?>
							 
	        <div class="accordion-separator"></div> 
	    </ul>
	 </div>

</div>


</body>
</html>