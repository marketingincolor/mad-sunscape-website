<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />

	<title><?php echo $page_title; ?> - <?php echo config_item('site.title'); ?></title>

	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	<?php Assets::add_css('960','screen'); ?>
	<?php echo Assets::css(); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>
	<?php echo Assets::external_js('js/jquery.ad-gallery.js'); ?>
</head>
<body>
<?php echo $google_analytics; ?>
	<div class="page container_16">

		<!-- Header -->
		<?php echo theme_view('header'); ?>
		<div class="logo">
			<a href="./"><img src="/bonfire/themes/default/images/grfx_logo.png" style="padding:4px 0px 0px 28px; width:370px;"></a>
		</div>
		<div class="nav grid_4">
			<?php Template::block('navbar', 'home/main_nav'); ?>
			<h3 style="padding-top:20px; padding-left:20px; color:#416880;">1-888-887-2022</h3>
		</div>

		<div class="main grid_12">
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

			<div class="grid_8 alpha">
				<?php Template::block('gallery'); ?>
				<div><?php echo isset($content) ? $content : Template::yield_content(); ?></div>
			</div>

			<div class="grid_4 omega">

                <?php
                if ($this->uri->segment(1) == 'xxx-about-madico')
                {?>
                    <div><?php Template::block('sidebar', 'home/sidebar', $data_list); ?></div>
                <?php }
                else
                {?>
                <div>

                    <!--<style>
                        #showbar { text-align:center; width:100%; font-weight:bold; color:#000; }
                        #showbar a { color:#000; }
                        a.line { text-decoration:underline; }
                        a.noline { text-decoration:none; }
                        #side-outer { max-height:700px; width:220px; background-color:#FFEDBF; }
                        #side-inner-us, #side-inner-ca { padding-left:10px; max-height:540px; width:210px; overflow:auto; color:#2C4F69; }
                        #side-inner-us a, #side-inner-ca a { color:#2C4F69; text-decoration:underline; margin-bottom:3px; font-size:11px; }
                        #side-inner-us p, #side-inner-ca p { font-size:12px; }
                    </style>-->

                    <div id="side-outer">
                        <a href="http://dealerdirectory.madico.com/" target="_blank"><img src="/uploads/Dealer-Directory-Skyscaper-Ad.jpg" style="width:100%" /></a><br />
                        <!--<div id="showbar">
                            <a href="#" name="showus" class="noline">United States</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" name="showca" class="line">Canada</a><hr style="width:90%;">
                        </div>
                        <div id="side-inner-us">
                            <?php //Template::block('sidebar', 'home/us_list_sidebar', $us_data_list); ?>
                        </div>

                        <div id="side-inner-ca" style="display:none;">
                            <?php //Template::block('sidebar', 'home/ca_list_sidebar', $ca_data_list); ?>
                        </div>-->
                    </div>

                </div>

                <?php }
                ?>

			</div>

			<br clear="both" /><br />
		</div>	<!-- /main -->

	<?php echo theme_view('footer'); ?>
	<div id="contact">&nbsp;</div>
	</div>	<!-- /page -->
	<br />
	<div id="debug"></div>

    <script>
        $(document).ready(function() {
            if(location.hash) {
                $('#togglebox_1').hide();
                $('#togglebox_2').show();
                $('#side-inner-us').show();
                $('#side-inner-ca').hide();
            };

            //select the a tag with name equal to revealer
            $('a[name=revealer]').click(function(e) {
                //Cancel the link behavior
                e.preventDefault();
                $('#togglebox_1').hide();
                $('#togglebox_2').show();
            });
            //select the a tag with name equal to showus
            $('a[name=showus]').click(function(e) {
                //Cancel the link behavior
                e.preventDefault();
                $('a[name=showus]').removeClass("noline line").addClass("noline");
                $('a[name=showca]').removeClass("noline line").addClass("line");
                $('#side-inner-us').show();
                $('#side-inner-ca').hide();
            });
            //select the a tag with name equal to showca
            $('a[name=showca]').click(function(e) {
                //Cancel the link behavior
                e.preventDefault();
                $('a[name=showus]').removeClass("noline line").addClass("line");
                $('a[name=showca]').removeClass("noline line").addClass("noline");
                $('#side-inner-us').hide();
                $('#side-inner-ca').show();
            });

        });
    </script>
<?php //echo $google_analytics; ?>
</body>
</html>
