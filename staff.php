<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!$_SESSION['privilege']){redirect_to(logout.php);}?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			&nbsp;
		</td>
		<td id="page">
			<h2>Main Menu</h2>
			<p>Welcome to the Voting World, <?php echo $_SESSION['username']; ?>.</p>
			
			<ul>
				<li><a href="create_event.php">Create Events</a></li>
				<li><a href="content.php">Edit Events</a></li>
				<li><a href="view_all.php">Vote Events</a></li>
				<li><a href="new_user.php">Add New User</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
