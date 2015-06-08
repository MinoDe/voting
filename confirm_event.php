<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in();?>
<?php
	$id=$_GET['id'];
	$priv=$_GET['priv'];
	$query = "INSERT INTO confirm_event (`event_id`, `confirm`) VALUES (
				{$id}, {$priv})";
	$result = mysql_query($query, $connection);
		if ($result) {
		// Success!
		redirect_to("confirmed_event.php?id=$id");
	} else {
		// Display error message.
		echo "<p>Event creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
	
?>

<?php mysql_close($connection); ?>