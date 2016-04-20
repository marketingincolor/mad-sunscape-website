<h2>Welcome to Default Page. This content is "plugged" into the template via the "yeild()" construct.</h2>

<p>The reason you're seeing this page is because the URI string passed to get to this page doesn't exist in the system. There is no page for it. Essentially, it's an error.</p>

<br/>

<p>If you would like to edit this page you'll find it located at:</p>

<div class="notification information">
	<p><code>bonfire/application/views/userspage/index.php</code></p>
</div>

<p>The corresponding controller for this page is found at:</p>

<div class="notification information">
	<p><code>bonfire/application/controllers/userspage.php</code></p>
</div>


<?php  
	// acessing our userdata cookie
	$cookie = unserialize($this->input->cookie($this->config->item('sess_cookie_name')));
	$logged_in = isset ($cookie['logged_in']);
	unset ($cookie);
		
	if ($logged_in) : ?>

	<div class="notification attention" style="text-align: center">
		<?php echo anchor(SITE_AREA, 'Dive into Bonfire\'s Springboard'); ?>
	</div>

<?php else :?>

	<p style="text-align: center">
		<?php echo anchor('/login', 'Login'); ?>
	</p>

<?php endif;?>