<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation($sel_subject, $sel_page); ?>
		</td>
		<td id="page">
			<?php if($_POST['submit']){
			if($_POST['evnt']==1){redirect_to("view_all.php");}
			elseif($_POST['evnt']==0){redirect_to("view_date.php");}
			}?>
			<form action="view_events.php" method="POST">
			<h1>View Events</h1>
			<input type="radio" name="evnt" value="1">View All <br /><br />
			<input type="radio" name="evnt" value="0">View By Date <br /><br />
			<input type="submit" name="submit" value="View">
			</form>
			<br />
			<a href="content.php">Cancel</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
