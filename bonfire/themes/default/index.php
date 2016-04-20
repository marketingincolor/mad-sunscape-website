<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo config_item('site.title'); ?></title>

	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	
<?php if (($this->uri->segment(1) == 'login')||($this->uri->segment(1) == 'forgot_password')) : ?>

	<?php echo Assets::css('960','screen'); ?>
	<?php echo Assets::css('login','screen'); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>
</head>
<body>
<br /><br />
	<div class="page container_16">
			<div class="main grid_8 prefix_4">
				<img src="./bonfire/themes/admin/images/grfx_admin_logo.png">
				<div class="rounded inner"><?php echo isset($content) ? $content : Template::yield(); ?></div>
			</div>

	</div>	<!-- /page -->
	
	<br clear="both" />
	<div id="debug"></div>
	
</body>
</html>


<?php else : ?>

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
			<div class="imageblock">
				<?php Template::block('slide', 'home/main_slideshow'); ?>
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
			
			<div class="grid_6 alpha">
				<div><?php echo isset($content) ? $content : Template::yield(); ?></div>
			</div>
			
			<div class="newsbox grid_6 omega">
				<?php Template::block('newsbox', 'home/main_newsfeed'); ?>
			</div>
			<br clear="both" /><br />
			
			<div class="grid_4 alpha">
				<a href="provide-comfort"><img src="./uploads/img_lower_1.jpg"></a>
			</div>
			<div class="grid_4">
				<a href="produce-energy-savings"><img src="./uploads/img_lower_2.jpg"></a>
			</div>
			<div class="grid_4 omega">
				<a href="protect-home-and-family"><img src="./uploads/img_lower_3.jpg"></a>
			</div>
			
			<br clear="both" /><br />
		</div>	<!-- /main -->
		
	<?php echo theme_view('footer'); ?>
	<div id="contact">&nbsp;</div>
	</div>	<!-- /page -->
	
	<br />
	<div id="debug"></div>
<?php echo isset($google_analytics) ? $google_analytics : ''; ?>

	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M4HQKL"
	                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-M4HQKL');</script>
	<!-- End Google Tag Manager -->

</body>
</html>
<?php endif;?>