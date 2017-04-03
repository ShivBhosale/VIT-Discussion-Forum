<?php
function dispcategories()
{
	include('dbconn.php');
	$select = mysqli_query($con, "SELECT * FROM categories");
	echo "<link href='/FORUM/styles/acs.css' type='text/css' rel='stylesheet' />";
	
	
	while($row =mysqli_fetch_assoc($select))
	{
		echo "<li>";
		echo "<input type='radio' name='select' class='accordion-select' checked />";
		echo "<div class='accordion-title'>";		
		echo "<span>";
		echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
		echo"</span>";
		echo "</div>";
		echo "<div class='accordion-content'>";
		echo "<table class='category-table'>";
		dispsubcategories($row['cate_id']);
		echo "</table>";
		echo "</div>";
		echo"<div class='accordion-separator'></div>";		
		echo"</li>";
	}
	
	
}

function dispsubcategories($parent_id)
{
	include('dbconn.php');
	
	$select = mysqli_query($con, "SELECT cate_id, subcat_id, subcategory_title, subcategory_decs FROM categories, subcategories WHERE ($parent_id = categories.cate_id) AND ($parent_id = subcategories.parent_id)");
	
	echo "<tr><th width='90%'><font color='#ffffff'> Categories </font></th><th width ='10%'><font color='#ffffff'>Topics</font></th></tr>";
	
	while($row= mysqli_fetch_assoc($select))
	{
		echo "<link href='/FORUM/styles/acs.css' type='text/css' rel='stylesheet' />";
		echo "<tr><td clas='category_title'><a class='links' href='/FORUM/topics.php?cid=".$row['cate_id']."&scid=".$row['subcat_id']."'>".$row['subcategory_title']."</br>"; //spen too much fucking time on this 
		echo $row['subcategory_decs']."</a></td>";
		echo "<td class = 'num-topics'><font color=red>".getnumtopics($parent_id, $row['subcat_id'])."</font></td></tr>";
		
	}
}

function getnumtopics($cate_id, $subcat_id)
{
	include('dbconn.php');
	$select = mysqli_query($con, "SELECT category_id, subcategor_id FROM topics WHERE ".$cate_id." = category_id AND ".$subcat_id."= subcategor_id");
	return mysqli_num_rows($select);
	
}

function disptopics($cid, $scid)
{
	include ('dbconn.php');
	$select = mysqli_query($con, "SELECT topic_id, author, title, content, date_posted, views, replies FROM categories, subcategories, topics WHERE ($cid = topics.category_id) AND ($scid=topics.subcategor_id) AND ($cid= categories.cate_id) AND ($scid= subcategories.subcat_id) ORDER BY topic_id DESC");
	if(mysqli_num_rows($select)!=0)
	{
		echo "<table class='topic-table'>";
		
		//echo "<tr><th>Title</th><th>Posted By</th><th>Date posted</th><th>Views</th><th>Replies</th>";
		echo "</div>";
		while($row=mysqli_fetch_assoc($select))
		{
			echo "<div class='accordion'>";
			echo "<ul>";
			//fourth slider
				  echo "<li>";
			echo "<input type='radio' name='select' class='accordion-select' checked />";
			
			echo "<div class='accordion-title'>";
			echo "<span>";
			echo "Attachments";
			echo "</span>";
			
			echo "</div>";
			echo "<div class='accordion-content'>";
			
			echo"can attach files n all";
			echo "</div>";
			echo "<div class='accordion-separator'></div>";
				  echo"</li>";
				  //third slider
				  echo "<li>";
			echo "<input type='radio' name='select' class='accordion-select' checked />";
			
			echo "<div class='accordion-title'>";
			echo "<span>";
			echo "Add Reply";
			echo "</span>";
			
			echo "</div>";
			echo "<div class='accordion-content'>";
			
			if(isset($_SESSION['Name']))
		 {
			 //wasted so mush time on [] thingy
			 echo "<div ><form action='/FORUM/addreply.php?cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."' method='POST'>
	<p>Comment: </p>
	<textarea cols='80' rows='8' id='comment' name='comment'></textarea><br />
	<br>
	<input class='myButton' type='submit' value='add comment'/>
	</form></div>";
			 	    	        			 
		 }
		else
		{
			echo "<font color=red>You Must Login First!</font>";
		}
			echo "</div>";
			echo "<div class='accordion-separator'></div>";
				  echo"</li>";
				  //second slider  
				 echo "<li>";
			echo "<input type='radio' name='select' class='accordion-select' checked />";
			
			echo "<div class='accordion-title'>";
			echo "<span>";
			echo "Replies (".countReplies($cid, $scid, $row['topic_id']).")";
			echo "</span>";
			
			echo "</div>";
			echo "<div class='accordion-content'>";
			
			dispreplies($cid, $scid, $row['topic_id']);
			echo "</div>";
			echo "<div class='accordion-separator'></div>";
				  echo"</li>";
				  //first slider
			echo "<li>";
			echo "<input type='radio' name='select' class='accordion-select' checked />";
			
			echo "<div class='accordion-title'>";
			echo "<span>";
			echo "<font size=4 color=red>";
			echo $row['title'];
			echo "</font>";
			echo "</span>";
			
			echo "</div>";
			echo "<div class='accordion-content'>";
			//<a href='/FORUM/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."' style='text-decoration: none'>
			//</a> removed for chutiyapa
			echo "
			<font size=10 color=#ffffff>
			     ".$row['title']."</font><br>";
				 echo "<br>";
				 echo $row['author'];
				 echo "<br><br>";
				 echo $row['content'];
			echo "</div>";
			echo "<div class='accordion-separator'></div>";
				  echo"</li>";
				
				   
				  //echo "</ul>";
                  //echo "</div>";
				 
				  echo "</ul>";
				  echo "</div>";
				  //spacing
				  echo "<div>";
		echo "<br><br>";
		echo "</div>";
		}
		//echo "</table>";
		
		
	}
	else {
			echo "<p>No topics!<a class='myButton' href='/FORUM/newtopic.php?cid=".$cid."&scid=".$scid."' style='text-decoration: none'><font color=#ffffff>
			add the first topic </font></a></p>";
		}
}

function disptopic($cid, $scid, $tid)
{
	include('dbconn.php');
	
	$select = mysqli_query($con, "SELECT cate_id, subcat_id, topic_id, author, title, content, date_posted FROM 
	                             categories, subcategories, topics WHERE ($cid= categories.cate_id) AND ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
								 $row=mysqli_fetch_assoc($select);
								 echo nl2br("<div class='content'><h2 class=='title'>".$row['title']."</h2><p>".$row['author']."\n".$row['date_posted']."</p></div>");
								 echo "<div class='content'><p>".$row['content']."</p></div>";
}

function addviews($cid, $scid, $tid)
{
	include ('dbconn.php');
	$update = mysqli_query($con, "UPDATE topics SET views = views+1 WHERE category_id=".$cid." AND subcategor_id = ".$scid." AND topic_id= ".$tid."");
}


function replylink($cid, $scid, $tid)
{
	echo "<p><a href='/FORUM/replyto.php?cid=".$cid."&scid=".$scid."&tid=".$tid."'> Relpy</a></p>";
}


function replytopost($cid, $scid, $tid)
{
	echo "<div class='content'><form action='/FORUM/addreply.php?cid=".$cid."&scid=".$scid."&tid=".$tid."' method='POST'>
	<p>Comment: </p>
	<textarea cols='80' rows='5' id='comment' name='comment'></textarea><br />
	<input type='submit' value='add comment'/>
	</form></div>";
}

function dispreplies($cid, $scid, $tid)
{
	
	include('dbconn.php');
	//include('validatelogin.php');
	//$_SESSION['Name']

	
	
	$select = mysqli_query($con, "SELECT replies.reply_id, replies.author, comment, replies.date_posted, replies.votes FROM categories, subcategories, topics, replies WHERE ($cid=replies.category_id) AND ($scid=replies.subcategory_id) AND ($tid=replies.topic_id) AND ($cid=categories.cate_id) AND ($scid=subcategories.subcat_id) AND ($tid=topics.topic_id) ORDER BY reply_id DESC"); //can add votes here

	
	
	//$row = mysqli_fetch_assoc($select);
		
	
	if(mysqli_num_rows($select)!=0)
	{
		//echo "<div class='content'><table class='reply-table'>";
		
		
		echo '<script>';
echo 'function upvotes($parent, $parent2, $cid, $scid, $voteprev)
{
	
	var A = parseInt($voteprev)+1;
	//alert (A); works
    $("#m"+$parent2).css({"background-color":"#a8025b"});	//worksss
	    $.ajax({ url: "upvote.php?type=votes&rid="+$parent+"&cid="+$cid+"&scid="+$scid+"",
         data: {action: "test"},
         type: "post",
         success: function(output) {
			               $("#"+$parent2).text("Upvotes: "+A);     
			            //alert("hereeee"); works
                      $("#m"+$parent2).hide();
                  }
});
	
	
}

function deletecomment($parent, $parent2, $parent3, $parent4)
{
	
	//alert ($parent); //works
	
	$.ajax({ url: "deletecomment.php?type=delete&rid="+$parent+"",
         data: {action: "test"},
         type: "post",
         success: function(output) {
			               $("#"+$parent2).hide();     
			            //alert("hereeee"); works
                      $("#"+$parent3).hide();
					   $("#"+$parent4).hide();
					    $("#m"+$parent4).hide();
					  
                  }
	
});
}

';
echo '</script>';
		while($row = mysqli_fetch_assoc($select))
		{
			$val = mysqli_query($con, "SELECT authorm, reply_idm, flag FROM upvotelog WHERE ('".$_SESSION['Name']."'=authorm) AND ('".$row['reply_id']."'=reply_idm)");
			$flag =mysqli_fetch_assoc($val);
			echo "<p id='mdel".$row['reply_id']."'><br >";
			echo $row['author'];
			echo "<br>";
		  echo $row['comment']; 
		  echo "<br>";
		  echo $row['date_posted'];
		  
		  echo "<br><p id='votes".$row['reply_id']."'> Upvotes: ".$row['votes']."</p><br>";
		  echo "</p>";
		  
		  if(isset($_SESSION['Name']))
		 {
			 if($flag['flag']!=1)
			 {
			 echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id='mvotes".$row['reply_id']."' class='myButton' href='javascript:void(0)' onclick=\"upvotes('".$row['reply_id']."','votes".$row['reply_id']."','".$cid."','".$scid."','".$row['votes']."')\" >Upvote</a>"; //create a ajax script for this	 
		     }
			 if($_SESSION['Name']==$row['author'])
			 {
				 echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id='mdelbtn".$row['reply_id']."' class='myButton' href='javascript:void(0)' onclick=\"deletecomment('".$row['reply_id']."','mdel".$row['reply_id']."','mdelbtn".$row['reply_id']."','votes".$row['reply_id']."')\">Delete</a>";
			 }
		 }
		  else
		  {
			  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color=red>login to vote</font>";
		  }
		  echo "<br><br>";
         //echo nl2br("<tr><th width='25%'>".$row['author']."<td>\n\n".$row['comment']."\n\n".$row['date_posted']."</td><td><input type='button' value='Vote' onclick=".upvote($row['reply_id'])."></td><td>".$row['votes']."</td></th></tr>");
		 //echo $row['reply_id']; //works
            
		}
		
		//echo "</table></div>";
	}
}

function deletecomment($parent_id)
{
	echo "here";
}
function upvote($parent_id)
{
	
		include ('dbconn.php');
		
	$update = mysqli_query($con, "UPDATE replies SET votes = votes+1 WHERE reply_id=$parent_id ");
	

}

function countReplies($cid, $scid, $tid)
{
	
	include ('dbconn.php');
	$select = mysqli_query($con, "SELECT category_id, topic_id FROM replies WHERE ".$cid." = category_id AND ".$scid."= subcategory_id AND ".$tid."= topic_id ");
	
	return mysqli_num_rows($select);
}

?>