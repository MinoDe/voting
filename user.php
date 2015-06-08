<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			&nbsp;
		</td>
		<td id="page">
			<h2>Main Menu</h2>
			<p>Welcome to the "Meeting" World, <?php echo $_SESSION['username']; ?>.</p>
			<ul>
				<li><a href="view_all.php">View The Events</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
