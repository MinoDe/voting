<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!$_SESSION['privilege']){redirect_to(logout.php);}?>
<?php
	if (intval($_GET['id']) == 0) {
		redirect_to("content.php");
	}
	
	$id = mysql_prep($_GET['id']);
	
	if ($subject = get_event_by_id($id)) {
		
		$query = "DELETE FROM events WHERE id = {$id} LIMIT 1";
		$result = mysql_query($query, $connection);
		if (mysql_affected_rows() == 1) {
			redirect_to("content.php");
		} else {
			// Deletion Failed
			echo "<p>Subject deletion failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"content.php\">Return to Main Page</a>";
		}
	} else {
		// subject didn't exist in database
		redirect_to("content.php");
	}
?>

<?php mysql_close($connection); ?>