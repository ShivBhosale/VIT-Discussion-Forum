<?php
function loginform()
{
	echo "<form action='/FORUM/validatelogin.php' method='POST'>
	<p><font color=#ffffff>Username</font></p>
	 <input type='text' id='usernameinput' name='usernameinput'/>
	 	 <p><font color=#ffffff>Password</font></p>
		 	 <input type='password' id='passwordinput' name='passwordinput'/>
			 <br><br>
			 	 <input class='myButton' type='submit' value='Login' />&nbsp&nbsp&nbsp
				 <button class='myButton' type='button' onclick='location.href=\"/FORUM/registration.html\";'>Register</button>
	
	</form>";
}

function logout()
{
	echo nl2br("<p><font color=#ffffff>Welcome ".$_SESSION['Name']."!\nYou are in!</font></p>
	     <form action='/FORUM/logout.php' method='GET'>
		 <input class='myButton' type='submit' value='Logout'/></form>");
			 
}

?>