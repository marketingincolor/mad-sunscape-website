<h2>Default Index</h2>

<p>This is the default index "view" for the site.</p>

<p>The actual front page content should be managed via the Pages module, once the route has been properly configured.</p>

<?php  
	// acessing our userdata cookie
	$cookie = unserialize($this->input->cookie($this->config->item('sess_cookie_name')));
	$logged_in = isset ($cookie['logged_in']);
	unset ($cookie);
		
	if ($logged_in) : ?>

	<div class="notification attention" style="text-align: center">
		<?php echo anchor(SITE_AREA, 'Access Admin Area'); ?>
	</div>

<?php else :?>

	<p style="text-align: center">
		<?php echo anchor('/login', 'Login'); ?>
	</p>

<?php endif;?>