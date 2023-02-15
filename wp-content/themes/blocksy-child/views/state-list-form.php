<?php
$newstate = get_query_var('state');
$zipcode = get_query_var('zipcode');
?>
<div class="left-side-form">
<form method="get" action="<?php echo get_site_url().'/school-list/'; ?>">
	<div class="state-field">
		<label>Select State</label>
		<select name="state" required="required">
			<option value="">--Select--</option>
			<?php
			foreach ($stateList as $value) {
			?>
				<option <?php echo ($newstate == $value['state_code']) ? 'selected="selected"' : '';?> value="<?php echo $value['state_code']?>"><?php echo $value['state']?></option>
				
			<?php }
			?>
		</select>
	</div>
	<br/>
	<div class="zipcode-field">
		<label>Zip Code</label>
		<input pattern="[0-9]{6}" maxlength="6" type="text" name="zipcode" placeholder="Zip Code" required="required" value="<?php echo ($zipcode) ? $zipcode : '';?>" />
	</div>
	<br/>
	<div>
	<input type="submit" value="submit" /> 
	</div>
</form>
</div>
