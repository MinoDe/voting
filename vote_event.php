<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php $id= $_GET['id'];
$event=get_event_by_id($id);?>
<?php
 include("includes/header.php"); ?>
 <?php event_confirm($id);?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="view_all.php">+Vote Events</a><br />
			<a href="new_event.php">+Create a new event</a><br />
			<a href="logout.php">+Logout</a>
		</td>
		<td id="page">
			<h2>Vote Event: <?php echo $event['name']; ?></h2>
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
			
			
				<b>Event Name</b>&nbsp;&nbsp;&nbsp;<?php echo $event['name'];?><br />
			<br /><b>Description</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo nl2br($event['description']);?><br /><br /><br /><br />
			<b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $event['date1_day'];?>
			<?php echo "   ".$event['date1_month'];?>
			<?php echo "   ".$event['date1_year'];?>
				
				
				<br /><br />
				<b>Start Time</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $event['time_hour'];?><?php echo "  ".$event['time_minutes'];?>
				
				
					</select>
					<br /><br />
					<b>Duration</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $event['duration'];?> hrs<br /><br />
					<b>Venue</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $event['venue'];?> <br /><br />
					<?php echo "Number of people who can attend";voting_event_yes($id);?><br /><br />
					<?php echo "Number of people who can't attend";voting_event_no($id);?><br /><br /><br /><br />
					<?php if(!isset($_GET['priv'])|| ($_GET['priv']!=0)){?>
					<?php 
					echo "<a href=\"vote_evaluate.php?vote=1&event_id=". $id."\"". " class=\"vote\"". ">Yes I can attend</a>".	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a href=\"vote_evaluate.php?vote=0&event_id=". $id."\"". "class=\"vote\"".">No I can't attend</a><br /><br />";
					?>
				<br /><br /><br />
				<?php if($_SESSION['privilege']){echo "<a href=\"confirm_event.php?id=".urlencode($event['id'])."&priv=1\""." class=\"vote\"".">CONFIRM EVENT</a>";?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<a href=\"confirm_event.php?id=".urlencode($event['id'])."&priv=0\""." class=\"vote\"".">CANCEL EVENT</a>";}}?>
				
						<br /><br /><br />
						<a href="view_all.php" class="vote">Cancel</a>
			
			
		</td>
	</tr>
</table>
<?php require("includes/footer.php");?>