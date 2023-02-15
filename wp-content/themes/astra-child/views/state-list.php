<?php
if($slug == 'state-form') { ?>
	<select name="state">
	<?php
	foreach ($stateList as $value) {
		if ($value['status'] == 1) {
			$status = "Enabled";
		} else {
			$status = "Disabled";
		}
	?>
		<option value="<?php echo $value['state']?>"><?php echo $value['state']?></option>
	<?php }
	?>
	</select>
<?php } else { ?>
<ul>
<?php
foreach ($stateList as $value) {
	if ($value['status'] == 1) {
		$status = "Enabled";
	} else {
		$status = "Disabled";
	}
?>
<li><?php echo $value['state']." ".'(Status- '.$status.' ,State Code- '.$value['state_code'].')'?></li>
<?php
}
}
?>
