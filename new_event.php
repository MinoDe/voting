<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!$_SESSION['privilege']){redirect_to(logout.php);}?>
<table id="structure">
	<tr>
		<td id="navigation">
			
				<li><a href="content.php">Edit Events</a></li>
				<li><a href="view_all.php">Vote Events</a></li>
				<li><a href="new_user.php">Add New User</a></li>
				<li><a href="logout.php">Logout</a></li>
		</td>
		<td id="page">
			<h2>Add Event</h2>
			<form action="create_event.php" method="POST">
			<b>Event Name</b>&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br />
			<br /><b>Description</b>&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="desc" cols="40" rows="6"></textarea><br /><br />
			<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="month">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
				</select>
				<select name="date">
				<?php for($i=1; $i<31; $i++){
					echo "<option value=\"".$i."\">".$i."</option>";
				}
				?>
				</select>
				<select name="year">
				<?php for($i=2010; $i<2020; $i++){
					echo "<option value=\"".$i."\">".$i."</option>";
				}
				?>
				</select><br /><br />
				<br /><br />
				<b>Start Time</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="hour">
					<?php for($i=00; $i<24; $i++){
					echo "<option value=\"".$i."\">".$i."</option>";
				}
				?>
					</select>
					<select name="minutes">
						<?php for($i=00; $i<60; $i++){
					echo "<option value=\"".$i."\">".$i."</option>";
				}
				?>
					</select>
					<br /><br />
					<b>Duration</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="duration" size="2"> hrs<br /><br />
					<b>Venue</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="venue"> <br /><br />
					<input type="submit" name="submit" value="Submit">
				</form>
			<br />
			<a href="staff.php">Cancel</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
