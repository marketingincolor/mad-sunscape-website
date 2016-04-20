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
			<div class="videoblock" style="min-height:328px;">
			
				<?php if($this->uri->segment(1) == 'why-sunscape'): ?>
					<img src="./uploads/woman-reading-book.jpg" alt="" />
				<?php elseif($this->uri->segment(1) == 'provide-comfort'): ?>
					<img src="./uploads/provide-comfort.jpg" alt="" />
				<?php elseif($this->uri->segment(1) == 'produce-energy-savings'): ?>
					<img src="./uploads/produce-energy-savings.jpg" alt="" />
				<?php elseif($this->uri->segment(1) == 'protect-home-and-family'): ?>
					<img src="./uploads/protect-home-and-family.jpg" alt="" />
				<?php else: ?>
					<?php Template::block('gallery'); ?>
				<?php endif; ?>

				<?php //Template::block('gallery'); ?>
				<!-- <img src="./uploads/video.jpg" alt="" /> --><br clear="all" />
			</div>
			<br />
			
			<div class="pagetitle">
			<?php if (strlen($page_title) < 16) :?>
				<h2><?php echo $page_title; ?></h2>
			<?php else: ?>
				<h2 style="font-size:28px;"><?php echo $page_title; ?></h2>
			<?php endif; ?>
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
			
			<?php echo isset($content) ? $content : Template::yield(); ?>
			
			<br clear="both" /><br />
		</div>	<!-- /main -->
		
	<?php echo theme_view('footer'); ?>
	<div id="contact">&nbsp;</div>
	</div>	<!-- /page -->
	<br />
	<div id="debug"></div>
<?php echo $google_analytics; ?>
</body>
</html>