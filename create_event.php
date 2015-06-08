<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php $mon=array("January"=>1,"February"=>2,"March"=>3, "April"=>4,"May"=>5,"June"=>6,"July"=>7,"August"=>8,"September"=>9,
"October"=>10,"November"=>11,"December"=>12);?>
<?php
	$errors = array();
	
	// Form Validation
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
	
	if (!empty($errors)) {
		redirect_to("new_event.php");
	}
?>
<?php
	$name = mysql_prep($_POST['name']);
	$desc = mysql_prep($_POST['desc']);
	$month=$_POST['month'];
	$date=$_POST['date'];
	$year=$_POST['year'];
	if($year < date("y")){	
	if($mon[$month]<date('m')){
	if($date<date("d")){
	redirect_to("view_all.php");
	}}}
	$hour=$_POST['hour'];
	$minutes=$_POST['minutes'];
	$duration = mysql_prep($_POST['duration']);
	$venue = mysql_prep($_POST['venue']);
?>
<?php
	$query = "INSERT INTO events (`name`, `description`, `date1_day`,
	 `date1_month`, `date1_year`, `time_hour`, `time_minutes`, `duration`, `venue`) VALUES (
				'{$name}', '{$desc}', {$date}, '{$month}',{$year},{$hour},{$minutes},'{$duration}','{$venue}'
			)";
	
	$result = mysql_query($query, $connection);
	if ($result) {
		// Success!
		redirect_to("content.php");
	} else {
		// Display error message.
		echo "<p>Event creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php mysql_close($connection); ?>