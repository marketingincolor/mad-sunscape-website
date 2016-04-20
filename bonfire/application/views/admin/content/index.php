<h1>Content Management Menu</h1>

<p>The Content Items in the submenu above will allow you to edit the various sections of this site.</p>

<p>The form below will allow you to edit the DEFAULT content used by ALL Page Templates.</p>

<p>This included the content blocks for the page footer, Social Media links, as well as hidden data such as your
Google Analytics code.</p>

<?php if (validation_errors()) : ?>
<div class="notification error">
	<p><?php echo validation_errors(); ?></p>
</div>
<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), 'class="constrained"'); ?>

		<div style="margin-top:5px;">
			<label for="content_footer_one">Footer Content Left</label>
			<textarea rows="10" name="content_footer_one"><?php echo isset($info['content_footer_one']) ? $info['content_footer_one'] : set_value('content_footer_one') ?></textarea>
		</div>
		<div style="margin-top:5px;">
			<label for="content_footer_two">Footer Content Middle </label>
			<textarea rows="10" name="content_footer_two"><?php echo isset($info['content_footer_two']) ? $info['content_footer_two'] : set_value('content_footer_two') ?></textarea>
		</div>
		
		<div style="margin-top:5px;">
			<label for="fb_footer">Facebook Code</label>
			<input type="text" name="fb_footer" value="<?php echo isset($info['fb_footer']) ? $info['fb_footer'] : set_value('fb_footer') ?>" />
		</div>
		<div style="margin-top:5px;">
			<label for="tw_footer">Twitter Code</label>
			<input type="text" name="tw_footer" value="<?php echo isset($info['tw_footer']) ? $info['tw_footer'] : set_value('tw_footer') ?>" />
		</div>
		
		<div style="margin-top:5px;">
			<label for="google_analytics">Google Analytics</label>
			<textarea rows="10" name="google_analytics"><?php echo isset($info['google_analytics']) ? $info['google_analytics'] : set_value('google_analytics') ?></textarea>
		</div>

	<div class="submits">
		<input type="submit" name="submit" value="Save Settings" />
	</div>

<?php echo form_close(); ?>