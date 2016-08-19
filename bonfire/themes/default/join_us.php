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
<body><a name="contact"></a><?php echo $google_analytics; ?>

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
			<div class=" grid_8 alpha" id="togglebox_1">

				<div style="background-color:#d8e3e9;">
					<img src="images/grfx_photo_joinus.png" width="460px" style="margin-bottom:10px;">
					<div style="margin:0 2em;">

						<h2 style=" line-height:20px; font-weight:bold; color:#2c4f69;">Join Us</h2>
						<h3 style=" line-height:20px; font-weight:bold; color:#2c4f69; margin:2em 0 1em;">With Sunscape, Success is on Your Horizon</h3>
						<p style="margin-bottom:14px; margin-top:5px;">If you were simply looking for a window film product to sell, you probably wouldn't be reading this. But you’re looking for something more. You’re discerning enough to know that an exceptional program has success built in. You understand that excellence goes far beyond a product itself, extending to the people who manufacture and stand behind it. You also understand the important role the manufacturer plays in supporting your every effort, from addressing technical requirements to providing you tools to go to market – and ultimately, helping you add to your growing business. Sunscape window films satisfy discriminating tastes and requirements like no other line of window films in the market today. Whether you’re addressing aesthetically-minded homeowners or cost-conscious commercial property managers, Sunscape creates a path of unquestionable opportunity for you.</p>

						<h3 style=" line-height:20px; font-weight:bold; color:#2c4f69; margin:2em 0 1em;">A Complete Program</h3>
						<p style="margin-bottom:14px; margin-top:5px;">Yes, Sunscape products address a multitude of glass and window configurations. But below the surface, Sunscape represents so much more. A complete program, ready-made for you to launch toward success. With risk-free products covering a wide array of applications, supported by a warranty program that creates peace of mind – both for you, and the most important people you will deal with … your customers. We have fully committed our resources to offer our Sunscape Dealers a comprehensive, ongoing support network that has taken current market demands into consideration, and will continue to evolve, even as the market changes.</p>

						<h3 style=" line-height:20px; font-weight:bold; color:#2c4f69; margin:2em 0 1em;">Ready for the Challenge?</h3>
						<p style="margin-bottom:14px; margin-top:5px;">Interested in learning more about the Sunscape business opportunity? Complete the form!</p>
						<br />

					</div>
				</div>

			</div>

			<div class="grid_4 omega">
				<div>

                    <style>
                        #showbar { text-align:center; width:100%; font-weight:bold; color:#000; }
                        #showbar a { color:#000; }
                        a.line { text-decoration:underline; }
                        a.noline { text-decoration:none; }
                        #side-outer { width:220px; background-color:#6f8598; }
                        #side-inner { text-align:center; }
	                    .submits { padding:2em 0 1em; width:100%; text-align:center; }
	                    .submits input { padding:.75em 3em; font-size:1em; margin-left:0; text-shadow:none; border-radius:0; border:none; background:#e9b91b none no-repeat; }
                        .submits input:hover { padding:.75em 3em; font-size:1em; margin-left:0; text-shadow:none; border-radius:0; border:none; box-shadow:none; }
                    </style>

                    <div id="side-outer">
                        <img src="./images/grfx_side_joinus.jpg" /><br />
	                    <div id="side-inner"><?php echo isset($content) ? $content : Template::yield_content(); ?></div>

                    </div>

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
