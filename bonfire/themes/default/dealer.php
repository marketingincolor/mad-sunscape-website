<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	
	<title><?php echo $page_title; ?> - <?php echo config_item('site.title'); ?></title>
	
	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	<?php Assets::add_css('960','screen'); ?>
	<?php echo Assets::css(); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>
	<style>
		#togglebox_2 {
			display: none;
		}
	</style>
</head>
<body><a name="contact"></a>
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
			<div class=" grid_8 alpha">
				<div class="bluebox rounded">
					<div>
						<p style="font-size:16px; line-height:18px; font-weight:bold; margin-bottom:14px; margin-top:5px;">
							Find A Friendly Sunscape Dealer near you
						</p>
						<p style="font-size:16px; margin-bottom:14px;">
							For residential and commercial property applications, you can find Sunscape Window Films dealers throughtout the U.S. and Canada. Scroll and click on our listings below to find the dealer nearest you!
						</p>
						<p style="font-size:16px; margin-bottom:14px;">
							Or <a href="http://dealerdirectory.madico.com/" target="_blank">click here to view</a> all Madico dealers.
						</p>
					</div>
				</div>
				<br />

                <style>
                    #showbar { padding:5px; text-align:center; width:210px; font-weight:bold; color:#000; float:left; background-color:#fff; }
                    #side-outer { display:inline-block; max-height:700px; width:460px;}
                    #side-inner-us, #side-inner-ca { font-size:12px; float:left; padding-left:10px; height:540px; width:210px; overflow:auto; color:#2C4F69; background-color:#FFEDBF; }
                    #side-inner-us a, #side-inner-ca a { color:#2C4F69; text-decoration:underline; margin-bottom:3px; font-size:12px; }
                    #side-inner-us p, #side-inner-ca p { font-size:12px; }
                </style>

                <div id="side-outer">
                    <h2 id="showbar">United States</h2>

                    <h2 id="showbar" style="margin-left:10px;">Canada</h2>

                    <div id="side-inner-us">
                        <?php Template::block('sidebar', 'home/us_list_sidebar', $us_data_list); ?>
                    </div>

                    <div id="side-inner-ca" style="margin-left:10px;">
                        <?php Template::block('sidebar', 'home/ca_list_sidebar', $ca_data_list); ?>
                    </div>
                </div>

			</div>

			<div class="grid_4 omega">
				<div>

                    <img src="./uploads/sunscape-gallery-images01_lg.jpg" width="220px" height="150px" style="margin-bottom:10px;">

                    <img src="./uploads/sunscape-gallery-images06_lg.jpg" width="220px" height="150px" style="margin-bottom:10px;">

                    <img src="./uploads/sunscape-gallery-images07_lg.jpg" width="220px" height="150px" style="margin-bottom:10px;">

                    <img src="./uploads/sunscape-gallery-images02_lg.jpg" width="220px" height="150px" style="margin-bottom:10px;">

                    <img src="./uploads/sunscape-gallery-images03_lg.jpg" width="220px" height="150px" style="margin-bottom:10px;">

                </div>
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