<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!$_SESSION['privilege']){redirect_to(logout.php);}?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			
			<br />
			<a href="staff.php">+ Main Menu</a><br />
			<a href="view_all.php">+ Vote Events</a><br />
			<a href="new_event.php">+ Create a new event</a>
		</td>
		<td id="page">
		
			<br />
			
		
			<h2>Select an Event to edit</h2>
			
		
		<ul>
			<?php 
					event_retrive_all();
					
			?>
			</ul>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
