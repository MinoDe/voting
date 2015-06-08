<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php if(!$_SESSION['privilege']){redirect_to(logout.php);}?>
<?php $id= $_GET['id'];
$event=get_event_by_id($id);?>
<?php
		
		if (isset($_POST['submit'])) {
			$errors = array();

		$required_fields = array('name', 'desc','month','date','year','hour','minutes','duration','venue');
	foreach($required_fields as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)) {
			$errors[] = $fieldname;
		}
	}
		$fields_with_lengths = array('name' => 50);
	foreach($fields_with_lengths as $fieldname => $maxlength ) {
		if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) { $errors[] = $fieldname; }
	}
	
	
			if (empty($errors)) {
				// Perform Update
				$name = mysql_prep($_POST['name']);
	$desc = mysql_prep($_POST['desc']);
	$month=mysql_prep($_POST['month']);
	$date=$_POST['date'];
	$year=$_POST['year'];
	$hour=$_POST['hour'];
	$minutes=$_POST['minutes'];
	$duration = mysql_prep($_POST['duration']);
	$venue = mysql_prep($_POST['venue']);
				
				$query = "UPDATE events SET 
							name = '{$name}', 
							description = '{$desc}', 
							date1_day = {$date},
							date1_month = '{$month}', 
							date1_year = {$year}, 
							time_hour = {$hour}, 
							time_minutes = '{$minutes}', 
							duration = '{$duration}', 
							venue = '{$venue}' 							 
						WHERE id = {$id}";
				$result = mysql_query($query, $connection);
				if (mysql_affected_rows() == 1) {
					// Success
					$message = "The subject was successfully updated.";
				} else {
					// Failed
					$message = "The subject update failed.";
					$message .= "<br />". mysql_error();
				}
				
			} else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			
			
			
		} // end: if (isset($_POST['submit']))
?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<ul>
				<li><a href="create_event.php">Create Events</a></li>
				<li><a href="content.php">Edit Events</a></li>
				<li><a href="view_all.php">Vote Events</a></li>
				<li><a href="new_user.php">Add New User</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</td>
		<td id="page">
			<h2>Edit Event: <?php echo $event['name']; ?></h2>
			<?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message . "</p>";
			} ?>
			<?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
				
			}
			?>
			<form action="edit_event.php?id=<?php echo urlencode($event['id']); ?>" method="post">
				<b>Event Name</b>&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $event['name'];?>"><br />
			<br /><b>Description</b>&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="desc" cols="40" rows="6"><?php echo nl2br($event['description']);?></textarea><br /><br />
			<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="month">
				<option value="January" <?php if($event['date1_month']=="January"){
					echo "SELECTED";
					}
				?>>January</option>
				<option value="February" <?php if($event['date1_month']=="February"){
					echo "SELECTED";
					}
				?>>February</option>
				<option value="March" <?php if($event['date1_month']=="March"){
					echo "SELECTED";
					}
				?>>March</option>
				<option value="April" <?php if($event['date1_month']=="April"){
					echo "SELECTED";
					}
				?>>April</option>
				<option value="May" <?php if($event['date1_month']=="May"){
					echo "SELECTED";
					}
				?>>May</option>
				<option value="June" <?php if($event['date1_month']=="June"){
					echo "SELECTED";
					}
				?>>June</option>
				<option value="July" <?php if($event['date1_month']=="July"){
					echo "SELECTED";
					}
				?>>July</option>
				<option value="August" <?php if($event['date1_month']=="August"){
					echo "SELECTED";
					}
				?>>August</option>
				<option value="September" <?php if($event['date1_month']=="September"){
					echo "SELECTED";
					}
				?>>September</option>
				<option value="October" <?php if($event['date1_month']=="October"){
					echo "SELECTED";
					}
				?>>October</option>
				<option value="November" <?php if($event['date1_month']=="November"){
					echo "SELECTED";
					}
				?>>November</option>
				<option value="December" <?php if($event['date1_month']=="December"){
					echo "SELECTED";
					}
				?>>December</option>
				</select>
				<select name="date">
				<?php for($i=1; $i<31; $i++){
				echo "<option value=\"".$i."\"";
				if($event['date1_day']==$i){
					echo "SELECTED";
					}
					echo ">".$i."</option>";
				}
				?>
				</select>
				<select name="year" value="<?php echo $event['date1_year'];?>">
				<?php for($i=2010; $i<2020; $i++){
					echo "<option value=\"".$i."\"";
				if($event['date1_year']==$i){
					echo "SELECTED";
					}
					echo ">".$i."</option>";
				}
				?>
				</select><br /><br />
				<br /><br />
				<b>Start Time</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="hour">
					<?php for($i=00; $i<24; $i++){
					echo "<option value=\"".$i."\"";
					if($event['time_hour']==$i){
					echo "SELECTED";
					}
					echo ">".$i."</option>";
				}
				?>
					</select>
					<select name="minutes">
						<?php for($i=00; $i<60; $i++){
					echo "<option value=\"".$i."\"";
					if($event['time_minutes']==$i){
					echo "SELECTED";
					}
					echo ">".$i."</option>";
				}
				?>
					</select>
					<br /><br />
					<b>Duration</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="duration" size="2" value="<?php echo $event['duration'];?>"> hrs<br /><br />
					<b>Venue</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="venue" value="<?php echo $event['venue'];?>"> <br /><br />
					
				<input type="submit" name="submit" value="Edit Event" />
				&nbsp;&nbsp;
				<a href="delete_event.php?id=<?php echo urlencode($event['id']); ?>" onclick="return confirm('Are you sure?');">Delete Event</a>
			</form>
			
			
			
			<br />
			<a href="content.php">Cancel</a>
			
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
