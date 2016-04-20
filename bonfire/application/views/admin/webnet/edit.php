<h1><?php echo is_bool($info) ? 'Create' : 'Edit'; ?> WebNet Content</h1>

<p>The form below will allow you to <?php echo is_bool($info) ? 'create' : 'edit'; ?> the Content of the WebNet Page.</p>

	<?php if (validation_errors()) : ?>
	<div class="notification error">
		<p><?php echo validation_errors(); ?></p>
	</div>
	<?php endif; ?>

	<?php echo form_open_multipart($this->uri->uri_string(), 'class="constrained"'); ?>
	<?php if (is_bool($info)) : ?>
		Method to pick any user from list and assign id to proper spot in form
	<div style="margin-top:5px;">
		<label for="uri">User</label>
		<?php $options = array(
                  '1' => 'user 1',
                  '2' => 'user 2',
                  '3' => 'user 3',
                  '4' => 'user 4',
                );
		echo form_dropdown('user_id', $options); ?>
	</div>
	<?php endif; ?>
	<div style="margin-top:5px;">
		<label for="uri">URI</label>
		<input type="text" name="uri" value="<?php echo isset($info->uri) ? $info->uri : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_name">Business Name</label><!-- <?php echo $info->bus_name; ?> -->
		<input type="text" name="bus_name" value="<?php echo isset($info->bus_name) ? $info->bus_name : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_street_1">Business Address</label>
		<input type="text" name="bus_street_1" value="<?php echo isset($info->bus_street_1) ? $info->bus_street_1 : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_street_2">Business Address (opt)</label>
		<input type="text" name="bus_street_2" value="<?php echo isset($info->bus_street_2) ? $info->bus_street_2 : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_city">Business City</label>
		<input type="text" name="bus_city" value="<?php echo isset($info->bus_city) ? $info->bus_city : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_state_code">Business State</label>
		<input type="text" name="bus_state_code" value="<?php echo isset($info->bus_state_code) ? $info->bus_state_code : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_zip">Business ZIP</label>
		<input type="text" name="bus_zip" value="<?php echo isset($info->bus_zip) ? $info->bus_zip : '' ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_phone">Business Phone</label>
		<input type="text" name="bus_phone" value="<?php echo isset($info->bus_phone) ? $info->bus_phone : '' ?>" />
	</div>
	
	<?php 
	$carrier = array(
		'' => 'Choose Carrier',
		'@tmomail.net' => 'T-Mobile',
		'@vmobl.com' => 'Virgin Mobile',
		'@cingularme.com' => 'Cingular',
		'@messaging.sprintpcs.com' => 'Sprint',
		'@vtext.com' => 'Verizon',
		'@messaging.nextel.com' => 'Nextel',
		'@email.uscc.net' => 'US Cellular',
		'@tms.suncom.com' => 'SunCom',
		'@ptel.net' => 'Powertel',
		'@txt.att.net' => 'AT&T',
		'@message.alltel.com' => 'Alltel',
		'@MyMetroPcs.com' => 'Metro PCS',
		'@vmobl.com' => 'Virgin',
		'@qwestmp.com' => 'Qwest',
		'@myboostmobile.com' => 'Boost',
		'@sms.mycricket.com' => 'Cricket',
	); ?>
	<div style="margin-top:20px;">
		<fieldset style="width:620px; margin:10px 0px 0px 80px;">
			<legend>Receive SMS text messages (optional)</legend>
			<span class='smaller'>
				If you would like to receive a text notification alerting you to check your email each time a 
				form is submitted through your WebNet site, please enter your cell phone number and select your 
				cell phone carrier<span class='red'>*</span>, below.
			</span><br /><br />
			<label for="bus_cellphone" style="width:120px;">Cell Phone #</label>
			<input type="text" name="bus_cellphone" value="<?php echo isset($info->bus_cellphone) ? $info->bus_cellphone : '' ?>" style="width:100px;" />
			<?php echo form_dropdown('bus_carrier', $carrier ,''. $info->bus_carrier . '');?><br /><br />
			<span class='green smaller'>Enter numerals only (NO spaces or punctuation). Example: 2125551212</span><br /> 
			<span class='red smaller'>*Standard text message rates apply.</span><br /><br />
		</fieldset>
	</div>

	<div style="margin-top:5px;">
		<label for="bus_phone">Active</label>
		<input type="text" name="active" value="<?php echo isset($info->active) ? $info->active : '' ?>" /><br />
		<span>(Set active to "no" to disable the page)</span>
	</div>
	<div style="margin-top:5px;">
		<label for="logo">Photo/Logo</label>
		<?php echo isset($info->image) ? '<img src="'.base_url().$info->image.'" />' : 'Not Available' ?><br />
		<label for="logo">Upload New Photo/Logo</label>
		<input type="file" name="userfile" value="<?php echo isset($info->image) ? $info->image : '' ?>" /><br />
		<span>(File MUST be in JPG or PNG format, no larger than 164 pixels by 164 pixels.)</span>
	</div>
	<input type="hidden" name="image" value="<?php echo isset($info->image) ? $info->image : set_value($info->image) ?>" />
	<br clear="all" />
		<div class="submits">
			<input type="submit" name="submit" value="Save Settings" /> or <?php echo anchor(SITE_AREA .'/webnet', 'Cancel'); ?>
		</div>
	<?php echo form_close(); ?>
