<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />

	<title><?php echo $page_title; ?> - <?php echo config_item('site.title'); ?></title>

	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	<?php Assets::add_css('960','screen'); ?>
	<?php echo Assets::css(); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>
</head>
<body>
<?php echo $google_analytics; ?>
	<div class="page container_16">

		<!-- Header -->
		<?php echo theme_view('header'); ?>
		<div class="logo">
			<a href="./"><img src="./bonfire/themes/default/images/grfx_logo.png" style="padding:4px 0px 0px 28px;"></a>
		</div>
		<div class="nav grid_4">
			<?php Template::block('navbar', 'home/main_nav'); ?>
			<h3 style="padding-top:20px; padding-left:20px; color:#416880;">1-888-887-2022</h3>
		</div>

		<div class="main grid_12">
			<br />
			<div class="imageblock">
				<!-- content to be replace with either block or module output for true gallery later
				<img src="./uploads/img_home_main.jpg"> -->
			</div>
			<br />
			<div class="pagetitle">
				<h2><?php echo $page_title; ?></h2>
			</div>
			<?php
				// acessing our userdata cookie
				$cookie = unserialize($this->input->cookie($this->config->item('sess_cookie_name')));
				$logged_in = isset ($cookie['logged_in']);
				unset ($cookie);

				if ($logged_in) : ?>
			<!-- <div class="profile">
				<a href="<?php echo site_url();?>">Home</a> |
				<a href="<?php echo site_url('users/profile');?>">Edit Profile</a> |
				<a href="<?php echo site_url('logout');?>">Logout</a>
			</div> -->
			<?php endif;?>

			<div class="grid_12 alpha">
				<div><?php echo isset($content) ? $content : Template::yield_content(); ?></div>
			</div>

			<br clear="both" /><br />
		</div>	<!-- /main -->

	<?php echo theme_view('footer'); ?>
	<div id="contact">&nbsp;</div>
	</div>	<!-- /page -->
	<br />
	<div id="debug"></div>
<?php //echo $google_analytics; ?>
</body>
</html>
