<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in();?>
<?php
	$vote=$_GET['vote'];
	$user_id=$_SESSION['user_id'];
	$event_id=$_GET['event_id'];
	$query = "SELECT * FROM vote WHERE event_id={$event_id} AND user_id={$user_id} LIMIT 1";
	$result = mysql_query($query, $connection);
	if(mysql_num_rows($result)== 0){
	$query = "INSERT INTO vote (`event_id`, `user_id`, `vote`) VALUES (
				{$event_id}, {$user_id},{$vote})";
	$result = mysql_query($query, $connection);
	}
	else{
	$query = "UPDATE  vote set vote={$vote} WHERE event_id={$event_id} AND user_id={$user_id} LIMIT 1";
	$result = mysql_query($query, $connection);
	}
	
	
	
	if ($result) {
		// Success!
		$_SESSION['message_head']="Thanks You!";
		$_SESSION['message']="You have voted Successfully. Thanks for voting.";
		redirect_to("messages.php");
	} else {
		// Display error message.
		echo "<p>Event creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
	
?>

<?php mysql_close($connection); ?>