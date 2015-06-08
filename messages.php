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
			<h2><?php echo $_SESSION['message_head'];?></h2>
			<p><?php echo $_SESSION['message']; ?>.</p>
			<a href="view_all.php">  Back to Main Menu</a>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
