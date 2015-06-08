<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php $id= $_GET['id'];
$event=get_event_by_id($id);?>
<?php
 include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="view_all.php">+Vote Events</a><br />
			<a href="logout.php">+Logout</a>
		</td>
		<td id="page">
			<h2>Vote Event: <?php echo $event['name'];?></h2>
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
					<?php echo "Number of people who can't attend";voting_event_no($id);?><br /><br />
					<?php echo "The meeting has been "; event_confirmation($id);?>
					
						<br />
			
		</td>
	</tr>
</table>
<?php require("includes/footer.php");?>