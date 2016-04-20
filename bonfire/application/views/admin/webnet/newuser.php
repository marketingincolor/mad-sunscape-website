<h1>Create New WebNet USER</h1>

<p>The form below will allow you to create a new WebNet USER as well as the Content of their WebNet Page.</p>

	<?php if (validation_errors()) : ?>
	<div class="notification error">
		<p><?php echo validation_errors(); ?></p>
	</div>
	<?php endif; ?>

	<?php echo form_open_multipart($this->uri->uri_string(), 'class="constrained"'); ?>
		<input type="hidden" name="role_id" value="4" />
	<fieldset><legend>Account Information</legend>
		<div style="margin-top:5px;">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo set_value('email'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="username">Username</label>
			<input type="text" name="username" value="<?php echo set_value('username'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="password">Password</label>
			<input type="password" name="password" value="<?php echo set_value('password'); ?>" />
		</div>
	</fieldset>
	
	<fieldset><legend>WebNet Page Information</legend>
		<div style="margin-top:5px;">
			<label for="uri">URI</label>
			<input type="text" name="uri" value="<?php echo set_value('uri'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_name">Business Name</label>
			<input type="text" name="bus_name" value="<?php echo set_value('bus_name'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_street_1">Business Address 1</label>
			<input type="text" name="bus_street_1" value="<?php echo set_value('bus_street_1'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_street_2">Business Address 2</label>
			<input type="text" name="bus_street_2" value="<?php echo set_value('bus_street_2'); ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_city">Business City</label>
			<input type="text" name="bus_city" value="" />
		</div>
		<!-- <div style="margin-top:5px;">
			<label for="bus_state_code">Business State (i.e. TX or CA)</label>
			<input type="text" name="bus_state_code" value="" />
		</div> -->
		
		<div style="margin-top:5px;">
			<label for="state_code"><?php echo lang('us_state'); ?></label>
			<?php echo state_select('', '', $country_code='US', 'bus_state_code'); ?>
		</div>
		
		
		<div style="margin-top:5px;">
			<label for="bus_zip">Business ZIP</label>
			<input type="text" name="bus_zip" value="" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_country_code">Country Code</label>
			<input type="text" name="bus_country_code" value="US" />
		</div>
		<div style="margin-top:5px;">
			<label for="bus_phone">Business Phone</label>
			<input type="text" name="bus_phone" value="" />
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
				<input type="text" name="bus_cellphone" value="" style="width:100px;" />
				<?php echo form_dropdown('bus_carrier', $carrier);?><br /><br />
				<span class='green smaller'>Enter numerals only (NO spaces or punctuation). Example: 2125551212</span><br /> 
				<span class='red smaller'>*Standard text message rates apply.</span><br /><br />
			</fieldset>
		</div>
	
		<div style="margin-top:5px;">
			<label for="active">Active</label>
			<input type="text" name="active" value="yes" />
			<span>(Set active to "no" to disable the page)</span>
		</div>
		<div style="margin-top:5px;">
			<label for="logo">Upload Photo/Logo</label>
			<input type="file" name="userfile" value="" />
			<span>(File MUST be in JPG or PNG format, no larger than 164 pixels by 164 pixels.)</span>
		</div>
		
	</fieldset>
	
	<br clear="all" />
		<div class="submits">
			<input type="submit" name="submit" value="Save Settings" /> or <?php echo anchor(SITE_AREA .'/webnet', 'Cancel'); ?>
		</div>
	<?php echo form_close(); ?>
